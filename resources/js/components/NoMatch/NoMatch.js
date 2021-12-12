import React from "react";
import { useLocation } from "react-router";

export default function NoMatch() {
    let location = useLocation();

    return (
        <div>
            <section class="page_404">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="col-sm-10 col-sm-offset-1  text-center">
                                <div class="four_zero_four_bg">
                                    <h1 class="text-center ">404 Not Page</h1>
                                </div>
                                <div class="contant_box_404">
                                    <h3 class="h2">
                                        no match for
                                        <code>{location.pathname}</code>
                                    </h3>

                                    <h3>
                                        the page you are looking for not
                                        avaible!
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
}
