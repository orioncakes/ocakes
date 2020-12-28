import React, { Component } from "react";
import "./shared.sass";
class AdminLayout extends Component {
    constructor(props) {
        super(props);
        this.state = {};
    }
    render() {
        return <React.Fragment>{this.props.children}</React.Fragment>;
    }
}

export default AdminLayout;
