import React, { Component } from "react";
import BootstrapTable from "react-bootstrap-table-next";
import paginationFactory from "react-bootstrap-table2-paginator";

import userListStore from "../../flux/stores/user/ListStore";

class UserLanding extends Component {
    constructor(props) {
        super(props);
        this._mount;
        this.state = {
            list: []
        };
    }

    componentWillUnmount() {
        this._mount = false;
        this.setState = (state, callback) => {
            return;
        };
    }

    componentDidMount() {
        this._mount = true;
        if (this._mount) {
            this.getInitialData();
        }
    }

    getInitialData() {
        userListStore.on("change", state => {
            this.setState({
                list: state.data,
                message: state.message
            });
        });
    }

    render() {
        const columns = [
            {
                dataField: "index",
                text: "Id",
                formatter: (cell, row, rowIndex, colIndex) => {
                    return <span>{rowIndex + 1}</span>;
                }
            },
            {
                dataField: "name",
                text: "Name",
                sort: true
            },
            {
                dataField: "email",
                text: "Email ",
                style: (cell, row, rowIndex, colIndex) => {
                    return { overflow: "hidden" };
                }
            },
            {
                dataField: "phone",
                text: "Phone Number "
            },
            {
                dataField: "is_local",
                text: "Local ",
                formatter: (cellContent, row) => {
                    if (row.is_local === 1) {
                        return (
                            <span className="badge rounded-pill bg-primary">
                                Yes
                            </span>
                        );
                    }
                    return (
                        <h5>
                            <span className="badge rounded-pill bg-danger">
                                No
                            </span>
                        </h5>
                    );
                }
            },
            {
                dataField: "is_active",
                text: "Status ",
                formatter: (cellContent, row) => {
                    if (row.is_active === 1) {
                        return (
                            <span className="badge rounded-pill bg-success">
                                Active
                            </span>
                        );
                    }
                    return (
                        <h5>
                            <span className="badge rounded-pill bg-secondary">
                                Deactive
                            </span>
                        </h5>
                    );
                }
            }
        ];
        return (
            <React.Fragment>
                <section className="page-content">
                    <section className="search-and-user">
                        <div className="admin-profile">
                            <span className="greeting">Hello admin</span>
                            <div className="notifications">
                                <span className="badge">1</span>
                                <i className="fa fa-car" />
                            </div>
                        </div>
                    </section>
                    <section className="grid">
                        <article className="p-3 d-flex flex-column">
                            <h3>All Users</h3>
                            <BootstrapTable
                                bootstrap4
                                hover
                                keyField="name"
                                data={this.state.list}
                                columns={columns}
                                defaultSorted={[
                                    {
                                        dataField: "name",
                                        order: "desc"
                                    }
                                ]}
                                pagination={paginationFactory()}
                            />
                        </article>
                    </section>
                    {/* <footer className="page-footer">
                        <small>
                            Made with <span>❤</span>
                            <i className="fa fa-car" />
                        </small>
                    </footer> */}
                </section>
            </React.Fragment>
        );
    }
}

export default UserLanding;
