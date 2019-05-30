export default {
    newclasses: {
        type: Object,
        required: false,
        default () {
            return {};
        }
    },
    value: {},
    name: {
        type: String,
        required: true
    },
    placeholder: {
        type: String,
        required: false
    },
    tooltiptitle: {
        type: String,
        required: false,
        default: ""
    },
    autoFocus: {
        type: Boolean,
        required: false,
        default: false
    },
    validate: {
        required: false,
        default: ""
    },
    showError: {
        required: false,
        default: false
    },
    autocomplete: {
        required: false,
        default: "off"
    },
    type: {
        required: false,
        default: "text"
    },
    scope: {
        required: false,
        default: ""
    },
    img: {
        required: false,
        default: ""
    },
    id: {
        required: true
    },
    mulitiple: {
        required: false,
        default: false
    },
    title: {
        required: false
    },
    minDate: {
        required: false,
        default: () => {
            return window.moment(new Date()).add("10", "minutes");
        }
    },
    maxDate: {
        required: false,
        default: () => {
            return false;
        }
    },
    timeOnly: {
        required: false,
        default: false
    },
    dateOnly: {
        required: false,
        default: false
    },
    defaultDate: {
        required: false,
        default: () => {
            return false;
        }
    },
    options: {
        required: false,
        default () {
            return [];
        }
    },
    numeric: {
        required: false,
        default: false
    },
    inputType: {
        required: false,
        default: 'text'
    }
}