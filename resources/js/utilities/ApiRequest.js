export class ApiRequest {
    constructor(url, requestId, data, message) {
        this.url = url;
        this.requestId = requestId;
        this.data = data;
        this.message = message;
    }
}
