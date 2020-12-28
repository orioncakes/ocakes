import axios, { AxiosRequestConfig } from "axios";

import ApiResponse from "./ApiResponse";
import {
    forbidden_error,
    generic_error,
    unauthorized_error
} from "./Constants";

let OK = 200;
let CREATED = 201;
let BADREQUEST = 400;
let UNAUTHORIZED = 401;
let FORBIBBEN = 403;
let NOTFOUND = 404;
let METHODNOTALLOWED = 405;
let NOTACCEPTABLE = 406;
let url = "http://127.0.0.1:8000/api";

export class Api {
    constructor(url) {
        url = url;
    }

    errorResponse(result, message) {
        if (result.response.status === UNAUTHORIZED) {
            const error_message = unauthorized_error;
            return new ApiResponse(error_message);
        } else if (result.response.status === UNAUTHORIZED) {
            const error_message = forbidden_error;
            return new ApiResponse(error_message);
        } else if (result.response.status === UNAUTHORIZED) {
            return new ApiResponse(message);
        } else if (result.response.status === UNAUTHORIZED) {
            return new ApiResponse(message);
        }
        return new ApiResponse(generic_error);
    }

    async get(request) {
        const config = {
            headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
            }
        };

        let response;
        let isError = false;
        const finalUrl = url + request.url;
        await axios
            .get(finalUrl, config)
            .then(result => {
                if (result.status === OK) {
                    response = new ApiResponse("", result.data);
                }
            })
            .catch(error => {
                isError = true;
                response = this.errorResponse(error, request.message);
            });

        return new Promise((resolve, reject) => {
            isError ? reject(response) : resolve(response);
        });
    }

    async post(request) {
        const config = {
            headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
                // "x-requestid":request.requestid
            }
        };

        let response;
        let isError = false;
        const finalUrl = url + request.url;

        await axios
            .post(finalUrl, request.data, config)
            .then(result => {
                if (result.status === OK || result.status === CREATED) {
                    response = new ApiResponse("Success", result.data);
                }
            })
            .catch(error => {
                isError = true;
                response = this.errorResponse(error, request.message);
            });

        return new Promise((resolve, reject) => {
            isError ? reject(response) : resolve(response);
        });
    }

    async put(request) {
        const config = {
            headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
                // "x-requestid":request.requestid
            }
        };

        let response;
        let isError = false;
        const finalUrl = url + request.url;

        await axios
            .put(finalUrl, request.data, config)
            .then(result => {
                if (result.status === OK) {
                    response = new ApiResponse("Success", result.data);
                }
            })
            .catch(error => {
                isError = true;
                response = this.errorResponse(error, request.message);
            });

        return new Promise((resolve, reject) => {
            isError ? reject(response) : resolve(response);
        });
    }

    async patch(request) {
        const config = {
            headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
                // "x-requestid":request.requestid
            }
        };

        let response;
        let isError = false;
        const finalUrl = url + request.url;

        await axios
            .patch(finalUrl, request.data, config)
            .then(result => {
                if (result.status === OK) {
                    response = new ApiResponse("Success", result.data);
                }
            })
            .catch(error => {
                isError = true;
                response = this.errorResponse(error, request.message);
            });

        return new Promise((resolve, reject) => {
            isError ? reject(response) : resolve(response);
        });
    }

    async delete(request) {
        const config = {
            headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
                // "x-requestid":request.requestid
            }
        };

        let response;
        let isError = false;
        const finalUrl = url + request.url;

        await axios
            .delete(finalUrl, config)
            .then(result => {
                if (result.status === OK) {
                    response = new ApiResponse("", result.data);
                }
            })
            .catch(error => {
                isError = true;
                response = this.errorResponse(error, request.message);
            });

        return new Promise((resolve, reject) => {
            isError ? reject(response) : resolve(response);
        });
    }

    async download(request) {
        const config = {
            headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin": "*"
            },
            responseType: "blob"
        };

        let response;
        let isError = false;
        const finalUrl = url + request.url;

        await axios
            .get(finalUrl, config)
            .then(result => {
                if (result.status === OK) {
                    response = new ApiResponse("", result.data);
                }
            })
            .catch(error => {
                isError = true;
                response = this.errorResponse(error, request.message);
            });

        return new Promise((resolve, reject) => {
            isError ? reject(response) : resolve(response);
        });
    }
}
