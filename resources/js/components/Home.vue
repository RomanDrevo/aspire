<template>

    <div>
        <input v-model="query" />

        <select v-model="selected">
            <option value="Money">Money</option>
            <option value="Demo">Demo</option>
        </select>

        <button @click="submitQuery">Send</button>
    </div>


</template>

<script>

    import axios from 'axios';

    export default {
        name: 'home',
        data() {
            return {
                query: '',
                selected: '',
                items: []
            }
        },
        methods: {
            submitQuery() {
                axios.get(`http://127.0.0.1:8000/games?text=${this.query}&playmode=${this.selected}`)
                    .then(res => console.log(res))
            }
        }
    }
</script>
