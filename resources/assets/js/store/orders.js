export default function (Vue) {
    Vue.orders = {
        NewOrder(order) {
            // alert('asdfaf')

            var orders = this.getOrders();
            order.id = this.makeid();
            orders.push(order);
            orders = JSON.stringify(orders);
            try{

                localStorage.setItem('orders', orders);
            }catch(DOMException){
                return new Promise((resolve, reject) => {
                    reject('You have too many un completed Orders please delete some of them')
                })
            }
            return new Promise((resolve, reject) => {
                resolve(JSON.parse(orders))
            })
        },
        makeid() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+=-";

            for (var i = 0; i < 5; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        },
        IsFound(order) {
            var orders = this.getOrders();
            orders = orders.filter((element) => {

                return (element.from === order.from &&
                    element.from_map === order.from_map &&
                    element.to === order.to &&
                    element.to_map === order.to_map
                )
            })
            // console.log(orders)
            return orders.length ? true : false;
        },
        getOrders() {
            var orders = localStorage.getItem('orders');
            return orders ? JSON.parse(orders) : [];
        },
        getOrder(id) {
            var orders = this.getOrders();
            var order = orders.filter((element) => {
                return element.id === id;
            })

            return new Promise((resolve, reject) => {
                if (order[0]) {
                    return resolve(order[0])
                } else {
                    return Vue.http.get('/api/orders/getOrder/'+id)
                        .then(response=>{
                            response.body.isStored = true
                            resolve(response.body);
                        },error=>{
                            reject(error)
                        })
                }
            })
        },
        removeOrder(order) {

            var orders = this.getOrders();
            orders = orders.filter(element => {
                return element.id !== order.id;
            })
            orders = JSON.stringify(orders);
            localStorage.setItem('orders', orders);
            return Vue.http.post('/api/orders/forgetOrder/'+order.id)
                .then(response=>{
                    var serverStoredOrders = response.body.map((e)=>{
                        e.id = e.encrypted
                        return e;
                    })
                    return serverStoredOrders.concat(JSON.parse(orders));
                })
                
            return new Promise((resolve, reject) => {
                return resolve(JSON.parse(orders));
            })
        },

        OrdersUserId() {
            var userTempId = localStorage.getItem('UserTempId');
            if (userTempId && userTempId.length === 5) {
                return userTempId;
            }
            return 0;
        },
        setUserTempId(id) {
            localStorage.setItem('UserTempId', id);
        },
        setActiveOrder(id) {
            localStorage.setItem('ActiveOrder', id)
        },
        getActiveOrder() {
            var activeOrderId = localStorage.getItem('ActiveOrder');
            return this.getOrder(activeOrderId)
        },
        saveOrderHelpers(order, helpers) {
            return Vue.http.post('/api/user/CalcPrice', helpers)
                .then(response => {
                    // console.log(response);
                    var orders = this.getOrders();
                    orders = orders.filter((element) => {
                        return element.id !== order.id
                    })
                    order.cost = response.body;
                    order.helpers = helpers;
                    orders.push(order);
                    orders = JSON.stringify(orders);
                    localStorage.setItem('orders', orders)
                    return order;
                })

        },
        updateOrder(id, newValueElements) {
            var orders = this.getOrders();
            orders.map(function (element) {
                if (element.id === id) {
                    for (var key in newValueElements) {
                        element[key] = newValueElements[key]
                    }
                }
            })



            orders = JSON.stringify(orders);
            localStorage.setItem('orders', orders);
        },
        
    }
    Object.defineProperties(Vue.prototype, {
        $orders: {
            get() {
                return Vue.orders;
            }
        }
    })
}