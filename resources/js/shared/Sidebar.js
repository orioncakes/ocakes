import React, { Component } from "react";
import History from "../utilities/history";
class Sidebar extends Component {
    constructor(props) {
        super(props);
        this._mount;
        this.state = {
            selectedPage: "home",
            menuItems: [
                { icon: "fa fa-car", name: "home" },
                { icon: "fa fa-car", name: "users" },
                { icon: "fa fa-car", name: "items" }
                // { icon: "fa fa-car", name: "trends" }
            ]
        };
    }

    componentWillUnmount() {
        this._mount = false;
    }

    componentDidMount() {
        this._mount = true;
        this.getTheSelectedPage();
    }

    getTheSelectedPage() {
        const loc = History.location.pathname.replace(/^\/|\/$/g, "");
        if (this._mount) {
            this.setState({
                selectedPage: loc
            });
        }
    }

    onSelectPage(selectedPage) {
        this.setState(
            {
                selectedPage
            },
            () => History.push(selectedPage)
        );
    }
    render() {
        return (
            <header className="page-header">
                <nav>
                    <a href="#0">
                        {/* <img
                            className="logo"
                            src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/vertical-logo.svg"
                            alt="forecastr logo"
                        /> */}
                    </a>
                    <button
                        className="toggle-mob-menu"
                        aria-expanded="false"
                        aria-label="open menu"
                    >
                        <i className="fa fa-car" />
                    </button>
                    <ul className="admin-menu">
                        <li className="menu-heading">
                            <h3>Admin</h3>
                        </li>
                        {this.state.menuItems.map((item, index) => {
                            return (
                                <li key={index}>
                                    <a
                                        className={
                                            this.state.selectedPage ===
                                            item.name
                                                ? "active"
                                                : ""
                                        }
                                        onClick={() =>
                                            this.onSelectPage(item.name)
                                        }
                                    >
                                        <i className={item.icon} />
                                        <span>{item.name}</span>
                                    </a>
                                </li>
                            );
                        })}
                        {/* <li>
                            <a
                                className={
                                    this.state.selectedPage === "pages"
                                        ? "active"
                                        : ""
                                }
                                onClick={() => this.onSelectPage("pages")}
                            >
                                <i className="fa fa-car" />
                                <span>Pages</span>
                            </a>
                        </li>
                        <li>
                            <a
                                className={
                                    this.state.selectedPage === "users"
                                        ? "active"
                                        : ""
                                }
                                onClick={() => this.onSelectPage("users")}
                            >
                                <i className="fa fa-car" />
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Trends</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Collection</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Comments</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Appearance</span>
                            </a>
                        </li>
                        <li className="menu-heading">
                            <h3>Settings</h3>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Options</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i className="fa fa-car" />
                                <span>Charts</span>
                            </a>
                        </li>
                         */}
                        {/* <li>
                                    <button
                                        className="collapse-btn"
                                        aria-expanded="true"
                                        aria-label="collapse menu"
                                    >
                                        <svg aria-hidden="true">
                                            <use xlinkHref="#collapse" />
                                        </svg>
                                        <span>Collapse</span>
                                    </button>
                                </li> */}
                    </ul>
                </nav>
            </header>
        );
    }
}

export default Sidebar;
