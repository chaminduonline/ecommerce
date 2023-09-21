/*
 *   Copyright (c) 2023 Chamindu Dilshan
 *   All rights reserved.
 *   Full Stack Engineer
 */
import axios from 'axios';

const instance = axios.create();

// Add an interceptor to set the Authorization header
instance.interceptors.request.use(
  (config) => {
    const token = JSON.parse(localStorage.getItem('vuex')).auth.user?.token; // Replace with your actual token storage key
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default instance;
