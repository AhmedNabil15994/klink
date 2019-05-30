const inputs = [{
        props: {
            name: trans('front.create.weightName'),
            placeholder: trans('front.create.weight'),
            img: '/images/food-scale-tool.svg',
            validate: 'required|decimal:3|min_value:1',
            id: 'weightInput',
            newclasses: {
                'half-width': true,
                'odd': true
            },
            numeric: true,
            autoFocus: true,

        },
        model: 'weight',
    }, {
        props: {
            name: trans('front.create.number'),
            validate: 'required|decimal:3|min_value:1',
            placeholder: trans('front.create.number'),
            id: "NumberOfItems",
            img: "/images/boxes.svg",
            newclasses: {
                'half-width': true,
                'even': true
            },
            numeric: true,
        },
        model: 'items',
    }, {
        props: {
            mulitiple: true,
            title: trans('front.create.totalSize'),
            id: 'coordinates',
            name: 'coordinates',

        },
        inputs: [{
                props: {
                    name: trans('front.create.width'),
                    placeholder: trans('front.create.width'),
                    validate: 'required|decimal:3|min_value:1'
                },
                model: 'width',
            },
            {
                props: {
                    name: trans('front.create.length'),
                    placeholder: trans('front.create.length'),
                    validate: 'required|decimal:3|min_value:1'
                },
                model: 'length',
            },
            {
                props: {
                    name: trans('front.create.height'),
                    placeholder: trans('front.create.height'),
                    validate: 'required|decimal:3|min_value:1'
                },
                model: 'height',
            },
        ],
    },
    {

        props: {
            name: trans('front.create.persons'),
            placeholder: trans('front.create.personsPlaceholer'),
            img: trans('front.create.personstooltip').replace('{{time}}', 5),
            validate: 'required|decimal:3|min_value:1',
            id: 'orderPersons',
            type: 'carrier',
            newclasses: {
                'half-width': true,
                'odd': true
            }

        },
        model: 'person',

    },
    {

        props: {
            name: trans('front.create.orderTime'),
            placeholder: trans('front.create.orderPlaceHolder'),
            validate: 'required|decimal:3|min_value:1',
            id: 'OrderTime',
            type: 'time',
            newclasses: {
                'half-width': true,
                'even': true
            }

        },
        model: 'time',

    },
    {
        props: {
            name: 'description',
            placeholder: trans('front.create.desc'),
            id: "description",
            type: 'textArea',
            validate: 'required'

        },
        model: 'description',
    },
]
export default inputs;