import { endpoint, GET_ALL_USERS } from "../../utilities/ActionConstants";
import { Api } from "../../utilities/Api";
import { ApiRequest } from "../../utilities/ApiRequest";
import { generic_error } from "../../utilities/Constants";
import AppDispatcher from "../AppDispatcher";
let api;
class UserAction {
    constructor() {
        api = new Api(endpoint);
    }

    async get() {
        try {
            const request = new ApiRequest("/users", "", null, generic_error);
            const result = await api.get(request);
            AppDispatcher.dispatch({
                type: GET_ALL_USERS,
                payload: result
            });
        } catch (error) {
            // notificationAction
            //     .show({
            //         severity: "alarm",
            //         message: error.message
            //     })
            //     .then();
        }
    }

    async post(data) {
        // try {
        //     const payload;
        //     // const payload = this.prepareResponse(data);
        //     const request = new ApiRequest("/users", "", null, generic_error);
        //     const result = await this.api.post(request);
        //     AppDispatcher.dispatch({
        //         type: TEST_ACTION,
        //         payload: result
        //     });
        // } catch (error) {
        // }
    }
}

const userAction = new UserAction();
export default userAction;
