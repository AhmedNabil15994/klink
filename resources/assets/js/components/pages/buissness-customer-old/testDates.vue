<template>
  <div class="container create-order-container">
    <div class="form-map-container" style="margin-top:20px;">
      <div class="order-form-wrapper" style="padding-bottom: 20px;">
        <div class="stops-wrapper">
          <div class="stops-inputs-head fieldset timing-tour">
            <div class="legend">{{trans('front.accounting.acctountingPeriod')}}</div>
            <div class="stops-inputs-head-main">
              <input-parent
                v-for="input in inputs"
                :key="input.model"
                v-bind="input.props"
                v-model="dates[input.model]"
              ></input-parent>
              <input-parent v-bind="condition.props" v-model="dates[condition.model]"></input-parent>
            </div>
            <div class="div">{{nextDay.format('l')}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      tour: {
        id: 37,
        notes: "",
        tour_number: "",
        tour_name: "",
        tour_type: "0",
        price: 0,
        is_active: 0,
        profile_id_company: null,
        ship_id: 16,
        created_at: "2019-01-03 22:57:58",
        updated_at: "2019-01-03 22:57:58",
        encrypted:
          "eyJpdiI6Ilg1QytnRTlleXB0MHpGU3VHb28xaVE9PSIsInZhbHVlIjoibmlLXC9FSG5JOUtYUFowQmkwTTFsRnc9PSIsIm1hYyI6IjViOWJlMDNiZGYxMDZmMzNlZDg1YzUyMTRhOTA0ZTFiYmFhNGIwN2Y0NGZkZGEwMDZhOTQ5OGRhZjA3OTk2MWUifQ==",
        stops: [
          {
            id: 94,
            name: "ahem",
            stop_description: null,
            stop_bar_code: null,
            weight: null,
            stop_time: "3.00",
            stop_type: "Static",
            address_id: 1,
            number_id: null,
            tour_id: 37,
            created_at: "2019-01-03 22:57:58",
            updated_at: "2019-01-03 22:57:58",
            stop_address: {
              id: 1,
              street: "Karl-Marx-Straße",
              city: "Berlin",
              home: "13",
              postal_code: "12043",
              additional: "",
              region: "Berlin",
              country_id: 56,
              lat_lng: '["52.48571","13.42631"]',
              created_at: "2019-01-02 19:57:59",
              updated_at: "2019-01-02 19:57:59",
              country_name: "Germany",
              country: {
                country_id: 56,
                code: "DE",
                name: "Germany",
                full_name: "Federal Republic of Germany",
                iso3: "DEU",
                number: 276,
                continent_code: "EU",
                display_order: 1
              }
            }
          }
        ],
        tour_dates: {
          id: 37,
          tour_id: 37,
          tour_start_date: "2019-01-03",
          tour_finish_date: null,
          tour_start_time: "22:00:00",
          tour_finish_time: "00:00:00",
          payment_date: "0000-00-00",
          cancellation_speak_day: "0000-00-00",
          payment_speak_day: "0000-00-00",
          days: '["Mo","Di"]',
          created_at: "2019-01-03 22:57:58",
          updated_at: "2019-01-03 22:57:58"
        },
        tour_details: {
          id: 31,
          min_day_hour: "00:00:00",
          max_day_hour: "00:00:00",
          additional_days: null,
          additional_price: null,
          tour_total_weight: "12.00",
          tour_total_distance: "6.00",
          tour_total_time: "60.00",
          tour_total_packets_number: "1.00",
          tour_average_stop_time: "3.00",
          number_of_stops: 2,
          tour_id: 37,
          order_person_id: null,
          created_at: "2019-01-03 22:57:58",
          updated_at: "2019-01-03 22:57:58"
        }
      },
      conditionObject: {
        0: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l");
        },
        1: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("week");
        },
        2: dayBeforeCondition => {
          var expected = window
            .moment(dayBeforeCondition, "l")
            .set({ date: 15 });
          if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("month");
          }
          return expected;
        },
        3: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("month");
        },
        4: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("quarter");
        },
        5: dayBeforeCondition => {
          var expected = window
            .moment(dayBeforeCondition, "l")
            .endOf("year")
            .subtract(0.5, "year");
          if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("year");
          }
          return expected;
        },
        6: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("year");
        }
      },
      dates: {
        startDate: window.moment(new Date().setMinutes(0)),
        every: 1,
        type: "days",
        condition: 0
      },
      inputs: [
        {
          props: {
            name: "sender" + trans("front.create.time"),
            placeholder: trans("front.create.chargingTime"),
            // img: '/images/food-scale-tool.svg',
            validate: "required",
            id: "sendertime",
            type: "timePicker",
            minDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
            dateOnly: true,
            newclasses: {
              "same-line": true
            }
          },
          model: "startDate"
        },
        {
          props: {
            name: "every",
            placeholder: "every",
            validate: "required|decimal:3|min_value:1",
            id: "weightInput",
            newclasses: {
              "same-line": true,
              odd: true
            },

            autoFocus: true
          },
          model: "every"
        },
        {
          props: {
            name: "receiver" + trans("front.create.isCompany"),
            placeholder: trans("front.create.isCompany"),
            // img: '/images/food-scale-tool.svg',
            validate: "required",
            id: "receiverisCompany",
            newclasses: {
              "same-line": true
            },
            type: "select",
            options: [
              {
                value: "days",
                text: "days"
              },
              {
                value: "weeks",
                text: "weeks"
              },
              {
                value: "months",
                text: "month"
              }
            ]
          },
          model: "type"
        }
      ]
    };
  },
  computed: {
    nextDay() {
      return window.moment(
        this.conditionObject[this.dates.condition](this.dayBeforeCondition)
      );
    },
    dayBeforeCondition() {
      var startDate = window.moment(this.dates.startDate, "l");

      return window.moment(startDate).add(this.dates.every, this.dates.type);
    },
    condition() {
      var input = {
        model: "condition",
        props: {
          name: "receiver" + trans("front.create.isCompany"),
          placeholder: trans("front.create.isCompany"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          options: [
            {
              text: "same day",
              value: 0
            },
            {
              text: "end of week",
              value: 1
            },

            {
              text: "too 15 of the month, or end of the month",
              value: 2
            },
            {
              text: "end of  month",
              value: 3
            },
            {
              text: "end of quarter",
              value: 4
            },
            {
              text: "half year",
              value: 5
            },
            {
              text: "end of year",
              value: 6
            }
          ],
          newclasses: {
            "same-line": true
          },
          type: "select"
        }
      };

      return input;
    }
  },
  props: {},
  watch: {},
  methods: {},
  components: {},
  created() {
    this.inputs[0].props.minDate = window.moment(
      this.tour.tour_dates.tour_start_date
    );
    this.dates.startDate = window.moment(this.tour.tour_dates.tour_start_date);
  },
  mounted() {}
};
</script>


/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/
 