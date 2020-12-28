import React, { Component } from "react";

class Landing extends Component {
    constructor(props) {
        super(props);
        this.state = {};
    }
    render() {
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
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                        <article style={{ height: 300 }} />
                    </section>
                    <footer className="page-footer">
                        <small>
                            Made with <span>❤</span>
                            <i className="fa fa-car" />
                        </small>
                    </footer>
                </section>
            </React.Fragment>
        );
    }
}

export default Landing;
