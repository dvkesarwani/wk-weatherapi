<template>
    <div class="container mx-auto">
        <div class="shadow-lg w-11/12 mx-auto md:w-6/12">
            <div class=" bg-gray-800 rounded-t-lg mt-20">
                <h1 class="text-center pt-5 font-bold text-4xl text-gray-400">Weather Forecast</h1>
                <div class="w-11/12 mx-auto py-5">
                    <input type="search" id="address" class="form-control form-control bg-white focus:outline-none focus:shadow-lg focus:border-w-2 focus:border-teal-500 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" placeholder="Where are we going?" />
                    <p class="text-gray-500 mt-3">Selected: <strong id="address-value">none</strong></p>
                </div> 
            </div>
            <div class=" bg-gray-900 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start mx-6 w-1/4">
                        <div class="text-5xl text-gray-500 font-bold sm:text-6xl">{{currentTemperature.actual}}<sup>o</sup>C</div>
                        <div class="text-base text-gray-500 font-medium mx-4">{{location.city}} <br><span class="text-sm">{{location.country}}</span></div>
                    </div>
                    <div class="w-1/4 text-gray-500">{{currentTemperature.summary}}</div>                    
                </div>
            </div>

        <div class="future-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">
        <div
          v-for="(day, index) in forecastDays"
          :key="day.ts"
          class="flex items-center"
          :class="{ 'mt-8' : index < 11 }"
        >
          <div class="w-1/6 text-lg text-gray-200">{{ toDay(day.ts) }}</div>
          <div class="w-4/6 px-4 flex items-center">
         <div class="ml-3 text-gray-200">{{ day.weather.description }}</div>
          </div>
          <div class="w-1/6 text-gray-200 text-right">
            <div>{{ Math.round(day.temp) }}°C</div>
          </div>
        </div>
      </div> <!-- end future-weather -->      
     </div>
    </div>
</template>

<script>
    export default {        
        mounted() {            
            this.fetchData()
            var placesAutocomplete = places({
                appId: 'pl8P9HXEV66M',
                apiKey: '4bc2d7cb8e625b6f31e2673c457c04cd',
                container: document.querySelector('#address')
            }).configure({
                type: 'city',
                aroundLatLngViaIP: false,
                });

            var $address = document.querySelector('#address-value')
            placesAutocomplete.on('change',(e) => { 
                $address.textContent = e.suggestion.value   
                this.location.city = `${e.suggestion.name}`
                this.location.country = `${e.suggestion.countryCode}`.toUpperCase()
            });

            placesAutocomplete.on('clear', function() {
                $address.textContent = 'none';
            });            
        },

        watch:{
            location:{
                handler(newValue, oldValue){                   
                    this.fetchData()
                },
                deep: true
            }
        },

        computed: {
            forecastDays() {
             return this.forecast.filter((day, index) => index > 0 )
          }
        },
        
        data() {
            return {
                location: {
                    city : 'Utrecht',
                    country : 'NL'
                },
                currentTemperature: {
                    actual : '',
                    summary : '',
                },
                forecast: []
            }
        },
        
         methods: {
          fetchData() {
          fetch(`/api/weather?city=${this.location.city},${this.location.country}`)
          .then(response => response.json())
          .then(data => { 
          this.currentTemperature.actual = Math.round(data.data[0].temp)
          this.currentTemperature.summary = data.data[0].weather.description
          this.forecast = data.data
         }) 
        },

        toDay(datetime) {
             const newDate = new Date(datetime*1000)
             const days = ['SUN','MON','TUE','WED','THU','FRI','SAT']
        return days[newDate.getDay()]
        }
      }
    }
</script>