import React, { Component } from "react";
import userAction from "../../flux/actions/UserAction";
import Sidebar from "../../shared/Sidebar";
import Landing from "./Landing";

class User extends Component {
    componentDidMount() {
        userAction.get().then();
    }
    render() {
        return (
            <React.Fragment>
                <Sidebar />
                <Landing />
            </React.Fragment>
        );
    }
}
export default User;
