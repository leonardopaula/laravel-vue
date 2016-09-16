<template>
    <div class="col m12">
        <div class="row">
            <nav>
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="#" class="brand-logo">Code Contas</a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li v-for="o in links">
                                <a v-link="o.routeName">{{ o.label }}</a>
                            </li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li v-for="o in links">
                                <a v-link="o.routeName">{{ o.label }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                links: [
                    {label: 'Contas a pagar', routeName: 'bill-pay.list'}
                ]
            };
        },
        ready() {
            console.log('Component ready.')
        },
        methods: {
            login(){
                this.$http.post('http://localhost:8000/api/token',this.user)
                    .then((response) => {
                        window.localStorage.setItem('token', response.data.token);
                    });
            }
        }
    }
</script>
