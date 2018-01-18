<template>
    <div class = "grid-container">
        <div class = "grid-x grid-padding-x">
            <div class = "large-6 medium-6 large-offset-3 medium-offset-2 columns">
                <div class = "medium-12 cell">
                    <label>Email
                        <input type = "text"
                               placeholder = "xyz@cytonn.com"
                               name = "email"
                               id = "email"
                               v-model="login.email"
                        >
                    </label>

                </div>
                <div class = "medium-12 cell">
                    <label>Password
                        <input type = "password"
                               placeholder = "* * * * * *"
                               name = "password"
                               id = "password"
                               v-model="login.password"
                        >
                    </label>

                </div>
                <div class = "login-button medium-12 cell">
                    <button class = "button medium" type = "submit" @click="submit"><i class="fa fa-power-off"></i> Login</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                login : {
                    email: 'john@example.com',
                    password: 'secret',
                }
            }
        },
        created()
        {
            console.log("Login Created");
        },
        methods: {
            submit()
            {
                let postData = {
                    client_id: 2,

                    client_secret: 'Ma814kaJ15hugE6uRwqxNJRp4XUSlgVjfokTpcxl',

                    grant_type: 'password',

                    username: this.login.email,

                    password: this.login.password,
                };

                axios.post('/oauth/token', postData)
                    .then(response => {
                        console.log(response);
                    })
            }
        }
    }

</script>
