export default [{
        "props": {
            "name": 'numberOfStops',
            "placeholder": trans('front.bystop.numberOfStops'),
            "tooltiptitle": trans('front.bystop.numberOfStopsDesc'),
            "id": 'TournumberOfStops',
            "validate": 'required|numeric|min_value:2',
            "numeric": true
        },
        "model": "numberOfStops",
    },
    {
        "props": {
            "name": 'totalweight',
            "id": trans('front.bystop.totalweight'),
            "placeholder": trans('front.bystop.totalweight'),
            "tooltiptitle": trans('front.bystop.totalweight'),
            "validate": 'required|decimal:2|min_value:1',
            "numeric": true
        },
        "model": 'totalWeight',
    },
    {
        "props": {
            "name": 'timePerStop',
            "placeholder": trans('front.bystop.timePerStop'),
            "tooltiptitle": trans('front.bystop.timePerStopDesc'),
            "id": 'tour_average_stop_time',
            "validate": 'required|numeric|min_value:1',
            "numeric": true
        },
        "model": "timePerStop",
    },
    {
        "props": {
            "name": 'numberofloadedpacket',
            "id": 'tour_total_packets_number',
            "placeholder": trans('front.bystop.numberofloadedpackets'),
            "tooltiptitle": trans('front.bystop.numberofloadedpackets'),
            "validate": 'required|numeric|min_value:1',
            "numeric": true
        },
        "model": 'numberOfPackets',
    }, {
        "props": {
            "name": 'totalTimeOfStops',
            "placeholder": trans('front.bystop.totalTimeOfStops'),
            "tooltiptitle": trans('front.bystop.totalTimeOfStopsDesc'),
            "id": trans('front.bystop.totalTimeOfStops'),
            "validate": 'required|decimal|min_value:5',
            "numeric": true
        },
        "if": true,
        "model": "totalTimeOfStops",
    }, {
        "props": {
            "name": 'totalDistanceStops',
            "placeholder": trans('front.bystop.totalDistanceStops'),
            "tooltiptitle": trans('front.bystop.totalDistanceStopsDesc'),
            "id": trans('front.bystop.totalDistanceStops'),
            "validate": 'required|decimal|min_value:1',
            "numeric": true
        },
        "if": true,
        "model": "totalDistanceStops",
    },
]