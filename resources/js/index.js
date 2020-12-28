import React, { Component } from "react";
import ReactDOM from "react-dom";
import { Router, Route } from "react-router-dom";
import Routes from "./Router";
import history from "./utilities/history";
import "react-bootstrap-table-next/dist/react-bootstrap-table2.min.css";

if (document.getElementById("app")) {
    ReactDOM.render(
        <Router history={history} basename="/admin">
            <Routes />
        </Router>,
        document.getElementById("app")
    );
}
