import "./bootstrap";
import "./alpinejs";
import "./search";
import "flowbite";

import chart01 from "./charts/chart-01";
import chart02 from "./charts/chart-02";
import chart03 from "./charts/chart-03";
// import map01 from "./map-01";

document.addEventListener("DOMContentLoaded", () => {
    chart01();
    chart02();
    chart03();
    // map01();
});
