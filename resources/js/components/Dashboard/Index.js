import React, { Component } from "react";
import Sidebar from "../../shared/Sidebar";
import Landing from "./Landing";

class Home extends Component {
    componentDidMount() {
        // testAction.get().then();
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
export default Home;
