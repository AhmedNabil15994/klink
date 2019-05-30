 const markerCheck = {
    getMessage(field, params, data) {
        console.log(field,params,data);
        return (data && data.message) || 'Something went wrong';
    },
    validate(value) {
        console.log('asdfasdf')
        return false;
    }
};
export default markerCheck