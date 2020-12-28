import { EventEmitter } from "events";
import { GET_ALL_USERS } from "../../../utilities/ActionConstants";
import AppDispatcher from "../../AppDispatcher";

class ListStore extends EventEmitter {
    constructor() {
        super();
        this.state = {
            data: []
        };
        AppDispatcher.register(e => {
            switch (e.type) {
                case GET_ALL_USERS:
                    Object.assign(this.state, e.payload.data);
                    this.emit("change", this.state);
                    break;
            }
        });
    }
}

const userListStore = new ListStore();
export default userListStore;
