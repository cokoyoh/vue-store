<template>
    <div class="grid-container">
        <div class = "grid-x">
            <div class = "large-6 medium-6 large-offset-3 medium-offset-3">
                <h2>Register Here</h2>
                <div class = "medium-12 cell">
                    <label>First Name
                        <input type = "text" placeholder = "Yoda"
                               name = "f_name" id="f_name">
                    </label>

                </div>
                <div class = "medium-12 cell">
                    <label>Last Name
                        <input type = "text" placeholder = "Jedi"
                               name = "l_name">
                    </label>

                </div>
                <div class = "medium-12 cell">
                    <label>Email
                        <input type = "text" placeholder = "xyz@cytonn.com"
                               name = "email">
                    </label>

                </div>
                <div class = "medium-12 cell">
                    <label>Password
                        <input id="password" type="password" class="form-control" name="password" required>
                    </label>

                </div>
                <div class = "medium-12 cell">
                    <label>Confirm Password
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </label>

                </div>
                <div class = "login-button medium-12 cell">
                    <button class = "button all-buttons" type = "submit">Register</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {}
        },
        created()
        {
            console.log("created register");
        }
    }

</script>