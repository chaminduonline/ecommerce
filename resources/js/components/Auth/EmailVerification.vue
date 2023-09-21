/*
 *   Copyright (c) 2023 Chamindu Dilshan
 *   All rights reserved.
 *   Full Stack Engineer
 */
<!-- EmailVerification.vue -->
<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Email Verification</div>

                        <div class="card-body">
                            <div class="alert alert-success" role="alert" v-if="verified">
                                <p>Your email has been verified!</p>
                            </div>
                            <p v-if="error">Error: {{ error }}</p>
                        </div>
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
            verified: false,
            error: "",
        };
    },
    mounted() {
        // Perform the email verification logic here
        this.verifyEmail();
    },
    methods: {
        async verifyEmail() {
            const id = this.$route.params.id; // Get the verification token from the URL parameter
            const token = this.$route.params.token; // Get the verification token from the URL parameter
            try {
                // Make an API request to your Laravel backend to verify the email
                const response = await axios.post(`/api/verify-email/${id}/${token}`);
                if (response.data.status === 'verified') {
                    this.verified = true;
                } else {
                    this.error = 'Email verification failed';
                }
            } catch (error) {
                this.error = 'Email verification failed';
            }
        },
    },
};
</script>
  