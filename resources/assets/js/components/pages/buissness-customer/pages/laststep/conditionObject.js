export default [{
        options: {
            text: window.trans('front.accounting.sameDay'),
            value: 0,
        },
        every(dayBeforeCondition) {
            return window.moment(dayBeforeCondition, "l");
        }
    },
    {
        options: {
            text: window.trans('front.accounting.startOfWeek'),
            value: 1,
        },
        every(dayBeforeCondition) {
            var nextDay = window.moment(dayBeforeCondition, 'l').startOf('week');
            if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
                return window.moment(nextDay, 'l').add(1, 'week');
            }
            return nextDay;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.endOfWeek'),
            value: 2
        },
        every(dayBeforeCondition) {
            var nextDay = window.moment(dayBeforeCondition, 'l').endOf('week');
            if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
                return window.moment(nextDay, 'l').add(1, 'week');
            }
            return nextDay;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.startOfMonth'),
            value: 3
        },
        every(dayBeforeCondition) {
            var nextDay = window.moment(dayBeforeCondition, 'l').startOf('month');
            if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
                return window.moment(nextDay, 'l').add(1, 'month');
            }
            return nextDay;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.endOfMonth'),
            value: 4,
        },
        every(dayBeforeCondition) {
            var nextDay = window.moment(dayBeforeCondition, 'l').endOf('month');
            if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
                return window.moment(nextDay, 'l').add(1, 'month');
            }
            return nextDay;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.halfOfMonth'),
            value: 5,
        },
        every(dayBeforeCondition) {
            var expected = window
                .moment(dayBeforeCondition, "l")
                .set({
                    date: 15
                });
            if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
                return window.moment(expected).endOf("month");
            }
            return expected;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.endOfQuarter'),
            value: 6
        },
        every(dayBeforeCondition) {
            var nextDay = window.moment(dayBeforeCondition, 'l').endOf('quarter');
            if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
                return window.moment(nextDay, 'l').add(1, 'quarter');
            }
            return nextDay;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.halfYear'),
            value: 7
        },
        every(dayBeforeCondition) {
            var expected = window
                .moment(dayBeforeCondition, "l")
                .endOf("year")
                .subtract(0.5, "year");
            if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
                return window.moment(expected).endOf("year");
            }
            return expected;
        }
    },
    {
        options: {
            text: window.trans('front.accounting.endOfYear'),
            value: 8
        },
        every(dayBeforeCondition) {
            var nextDay = window.moment(dayBeforeCondition, 'l').endOf('year');
            if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
                return window.moment(nextDay, 'l').add(1, 'year');
            }
            return nextDay;
        }

    },
]
