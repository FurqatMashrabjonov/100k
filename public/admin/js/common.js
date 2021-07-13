"use strict";
var calendarMonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

function DatePicker() {
    var e = this;
    this.weekDay = ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"], this.options = {
        mode: "range",
        dateFormat: "d.m.y",
        monthSelectorType: "static",
        yearSelectorType: "static",
        locale: {weekdays: {shorthand: this.weekDay}, rangeSeparator: " / "},
        onReady: function () {
            console.log(e)
        },
        onDayCreate: function () {
        },
        onYearChange: function () {
        }
    };
    flatpickr(".js-datepicker", this.options)
}

function CalendarInline(e) {
    var t = this;
    this.calendar = document.querySelector(e), this.widget = document.querySelector('[data-calendar="'.concat(e, '"]')), this.weekDay = ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"], this.calendarOptions = {
        inline: !0,
        monthSelectorType: "static",
        yearSelectorType: "static",
        locale: {weekdays: {shorthand: this.weekDay}},
        onReady: function () {
            return t.ready(t.calendar)
        },
        onDayCreate: this.createEvents.bind(this),
        onYearChange: this.getYear.bind(this)
    }, this.calendar && flatpickr(this.calendar.querySelector(".js-calendar-inline"), this.calendarOptions)
}

function CalendarFull() {
    var o = this;
    this.switcherDate = document.querySelectorAll(".switcher-date"), this.events = document.querySelectorAll(".c-event"), this.reminders = document.querySelectorAll(".calendar__reminder"), this.eventColor = null, this.events[0] && (this.events.forEach(function (e) {
        var t = e.querySelector('[data-target="remove"]');
        e.addEventListener("click", function (e) {
            return o.showEvent(e)
        }), t && t.addEventListener("click", function (e) {
            return o.eventRemove(e)
        })
    }), window.addEventListener("click", function (e) {
        return o.closeAllEvent(e)
    })), this.reminders[0] && this.reminders.forEach(function (e) {
        e.querySelector('[data-toggle="remove"]').addEventListener("click", function (e) {
            return o.reminderRemove(e)
        })
    }), this.switcherDate[0] && this.switcherDate.forEach(CalendarFull.switcherDateToggle)
}

function ChartProgressCircle() {
    this.element = document.querySelectorAll(".js-progress-circle"), this.element[0] && this.element.forEach(function (e) {
        var t = e;
        $(t).circleProgress({
            startAngle: -Math.PI / 2,
            lineCap: "round",
            dotRadius: 10,
            thickness: 5,
            size: 112,
            fill: {color: t.getAttribute("data-color")},
            emptyFill: themeStyle("--grey-light-color-4", "--black-color-3")
        })
    })
}

function Charts(e, t) {
    var o = this;
    this.element = document.getElementById(e), this.element && setTimeout(function () {
        o.init(t)
    })
}

CalendarInline.prototype.ready = function (e) {
    var t = e.querySelector(".cur-year"), o = document.createElement("div");
    o.classList = "calendar-inline__year text-grey", o.innerHTML = t.value, t.parentNode.prepend(o)
}, CalendarInline.prototype.getYear = function (e, t, o) {
    this.calendar.querySelector(".calendar-inline__year").textContent = o.currentYear
}, CalendarInline.prototype.renderWidget = function (e, t, o) {
    this.widget.querySelector(".calendar-widget__dateday").textContent = e, this.widget.querySelector(".calendar-widget__month").textContent = calendarMonth[t], this.widget.querySelector(".calendar-widget__weekday").textContent = this.weekDay[o]
}, CalendarInline.prototype.createEvents = function (e, t, o, r) {
    var n = r, i = document.createElement("div"), a = n.dateObj;
    i.classList = "event", (new Date).getTime() - 1728e5 > a.getTime() - 864e5 && (new Date).getTime() - 1728e5 < a.getTime() && n.append(i), (new Date).getTime() + 1728e5 < a.getTime() + 864e5 && (new Date).getTime() + 1728e5 > a.getTime() && (i.classList.add("event--upcoming"), n.append(i), this.renderWidget(a.getDate(), a.getMonth(), a.getDay())), (new Date).getTime() + 432e6 < a.getTime() + 864e5 && (new Date).getTime() + 432e6 > a.getTime() && (i.classList.add("event--upcoming"), n.append(i))
}, CalendarFull.prototype.showEvent = function (e) {
    var t = e.currentTarget, o = document.querySelector(t.getAttribute("href"));
    e.preventDefault(), t.classList.contains("active") || t.classList.contains("c-event--active") || t.classList.contains("c-event--draggable") || (o.classList.contains("show") && o.classList.remove("show"), this.events.forEach(function (e) {
        return e.classList.remove("active")
    }), t.classList.add("active"), o.classList.remove(this.eventColor), this.eventColor = t.getAttribute("data-color"), setTimeout(function () {
        o.classList.add("show")
    }, 10), o.classList.add(this.eventColor))
}, CalendarFull.prototype.closeAllEvent = function (e) {
    e.target.closest(".c-event") || e.target.closest(".dropdown-c-event") || this.events.forEach(function (e) {
        var t = document.querySelector(e.getAttribute("href"));
        e.classList.remove("active"), t.classList.contains("show") && t.classList.remove("show")
    })
}, CalendarFull.prototype.reminderRemove = function (e) {
    var t = e.target.closest(".calendar__reminder");
    $(t).slideUp(200)
}, CalendarFull.prototype.eventRemove = function (e) {
    e.currentTarget.closest(".c-event").remove()
}, CalendarFull.switcherDateToggle = function (e) {
    var t = e.querySelector(".switcher-date__input"), o = document.querySelector(".calendar-toolbox__month"),
        r = e.querySelector(".js-input-select"), n = document.querySelectorAll(".switcher-date__btn");
    if (t) {
        var i = r.options.length, a = r.options.selectedIndex, s = !1, c = function (e) {
            setTimeout(function () {
                o.classList.add(e)
            }, 10)
        };
        t.addEventListener("click", function () {
            $(r).select2("open"), a = r.options.selectedIndex
        }), $(r).on("change", function () {
            var e = r.options[r.selectedIndex].text;
            t.innerHTML = e, o.classList.remove("is-previous"), o.classList.remove("is-next"), s || (r.options.selectedIndex < a ? c("is-previous") : c("is-next")), s = !1, a = r.options.selectedIndex, setTimeout(function () {
                o.innerHTML = e
            }, 200)
        }), n.forEach(function (e) {
            e.addEventListener("click", function (e) {
                var t = e.currentTarget.getAttribute("data-toggle");
                if ("prev" === t) {
                    if (0 === r.options.selectedIndex) return s = !0, r.options.selectedIndex = i - 1, c("is-previous"), void $(r).trigger("change");
                    r.options.selectedIndex--
                }
                if ("next" === t) {
                    if (r.options.selectedIndex === i - 1) return s = !0, r.options.selectedIndex = 0, c("is-next"), void $(r).trigger("change");
                    r.options.selectedIndex++
                }
                $(r).trigger("change")
            })
        })
    }
}, Charts.prototype.init = function (e) {
    new ApexCharts(this.element, e).render()
}, Charts.tooltip = function () {
    return {
        custom: function (e) {
            var t = e.series, o = e.dataPointIndex, r = e.w, n = "";
            return t.forEach(function (e) {
                n += '\n                    <span class="chart-tooltip-custom__value">'.concat(e[o], '</span>\n                    <span class="chart-tooltip-custom__separate-item"></span>\n                ')
            }), '\n                <div class="chart-tooltip-custom">\n                    <div class="chart-tooltip-custom__items">'.concat(n, '</div>\n                    <div class="chart-tooltip-custom__title">Jan ').concat(r.globals.labels[o], "</div>\n                </div>\n            ")
        }
    }
};
var echartsElements = [];

function Echart(e, t) {
    var o = this;
    this.element = document.getElementById(e), this.element && setTimeout(function () {
        o.init(t)
    })
}

function chart() {
    var e = function (e) {
        var t = document.querySelector(e);
        if (!t) return !1;
        var o = t.getAttribute("data-series");
        return JSON.parse(o)
    }, t = {
        series: [{name: "Session Duration", data: e("#revenueChart")[0]}, {
            name: "Page Views",
            data: e("#revenueChart")[1]
        }],
        chart: {height: "100%", type: "area", toolbar: !1},
        grid: {borderColor: themeStyle("--border-grey-color")},
        dataLabels: {enabled: !1},
        stroke: {
            lineCap: "round",
            colors: [themeStyle("--grey-color-4", "--grey-color-4"), "#FF8A48"],
            width: [4, 4],
            curve: "smooth",
            dashArray: [8, 0]
        },
        fill: {
            type: ["gradient", "gradient"],
            colors: [themeStyle("--grey-color-4", "--black-color-3"), themeStyle("rgba(255, 138, 72, 0.5)", "rgba(255, 138, 72, 0.3)", !1)],
            gradient: {
                type: "horizontal",
                gradientToColors: [themeStyle("--grey-color-4", "--black-color-3"), themeStyle("rgba(255, 61, 87, 0.5)", "rgba(255, 61, 87, 0.3)", !1)],
                opacityFrom: [themeStyle(.15, .15, !1), 1],
                opacityTo: [themeStyle(.15, .15, !1), 1],
                stops: [0, 88]
            }
        },
        markers: {
            size: 0,
            colors: [themeStyle("--grey-color-3", "--grey-color-4"), "#FF8A48"],
            strokeColors: "#FFFFFF",
            strokeWidth: 5,
            strokeOpacity: 1
        },
        legend: {show: !1},
        xaxis: {
            categories: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan"],
            tooltip: !1,
            labels: {
                offsetY: 5,
                style: {
                    colors: themeStyle("--text-secondary-color"),
                    fontWeight: 400,
                    fontSize: "12px",
                    fontFamily: themeStyle("--font-family-default")
                }
            },
            axisTicks: {show: !1},
            axisBorder: {show: !0, color: themeStyle("--border-grey-color")},
            crosshairs: {
                show: !0,
                width: 1,
                position: "back",
                opacity: .9,
                stroke: {color: "#B3C0CE", width: 1, dashArray: 4}
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: themeStyle("--text-secondary-color"),
                    fontWeight: 400,
                    fontSize: "12px",
                    fontFamily: themeStyle("--font-family-default")
                }
            }
        },
        tooltip: Charts.tooltip()
    }, o = {
        series: e("#profitPieChart"),
        labels: ["Current", "Lost", "Target"],
        colors: ["#FF3D57", "#FDBF5E", "#22CCE2"],
        chart: {
            type: "donut",
            dropShadow: {
                enabled: !0,
                top: 0,
                left: 4,
                blur: 0,
                color: ["rgb(255, 61, 87)", "rgb(253, 191, 94)", "rgb(34, 204, 226)"],
                opacity: .35
            }
        },
        dataLabels: {enabled: !1},
        legend: {show: !1},
        stroke: {show: !1},
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: !0,
                        name: {
                            show: !0,
                            offsetY: 32,
                            color: themeStyle("--text-secondary-color"),
                            formatter: function (e) {
                                return e
                            }
                        },
                        value: {
                            fontSize: "36px",
                            fontWeight: 700,
                            fontFamily: themeStyle("--font-family-default"),
                            color: themeStyle("--text-primary-color"),
                            offsetY: -12,
                            formatter: function (e) {
                                return "$" + e
                            }
                        },
                        total: {
                            show: !0,
                            color: themeStyle("--text-secondary-color"),
                            fontWeight: 400,
                            formatter: function (e) {
                                var o;
                                return e.globals.seriesTotals.reduce(function (e, t) {
                                    return o = e + t
                                }, 0), "$" + o
                            }
                        }
                    }
                }
            }
        }
    }, r = {
        grid: {show: !0, left: "30", right: "0", top: "50", bottom: "45", borderColor: "transparent"},
        tooltip: Echart.tooltip(),
        barGap: "30%",
        legend: {
            data: ["Views", "Comment"],
            left: "right",
            itemGap: 50,
            itemWidth: 8,
            icon: "circle",
            textStyle: {
                fontSize: 15,
                fontFamily: themeStyle("--font-family-default"),
                color: themeStyle("--text-primary-color")
            }
        },
        color: ["#22CCE2", "#FF3D57"],
        toolbox: {show: !1},
        xAxis: [{
            type: "category",
            offset: 19,
            axisTick: {show: !1},
            data: e("#activityChart")[0],
            axisLabel: {
                fontSize: 12,
                fontFamily: themeStyle("--font-family-default"),
                color: themeStyle("--text-secondary-color")
            },
            axisLine: {lineStyle: {color: themeStyle("--border-grey-color")}}
        }],
        yAxis: [{
            type: "value",
            axisLabel: {
                fontSize: 12,
                fontFamily: themeStyle("--font-family-default"),
                color: themeStyle("--text-secondary-color")
            },
            splitLine: {lineStyle: {color: themeStyle("--border-grey-color")}}
        }],
        series: [{
            name: "Views",
            type: "bar",
            barGap: 0,
            data: e("#activityChart")[1],
            itemStyle: {borderRadius: [5, 5, 0, 0]}
        }, {name: "Comment", type: "bar", data: e("#activityChart")[2], itemStyle: {borderRadius: [5, 5, 0, 0]}}]
    }, n = {
        series: e("#taskPieChart"),
        chart: {type: "radialBar", toolbar: {show: !1}},
        colors: ["#FF3D57", "#FDBF5E", "#04AAB3"],
        stroke: {lineCap: "round"},
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 225,
                hollow: {margin: 0, size: "30%", position: "front"},
                track: {
                    background: themeStyle("#EFF4F8", "#2D3743", !1),
                    strokeWidth: "57%",
                    margin: 20,
                    dropShadow: {enabled: !1}
                },
                dataLabels: {
                    show: !0,
                    name: {show: !0, offsetY: 26, color: themeStyle("--text-secondary-color")},
                    value: {
                        fontSize: "28px",
                        fontWeight: 700,
                        fontFamily: themeStyle("--font-family-default"),
                        color: themeStyle("--text-primary-color"),
                        offsetY: -14
                    },
                    total: {
                        show: !0,
                        label: "Tasks",
                        color: themeStyle("--text-secondary-color"),
                        fontWeight: 400,
                        fontSize: "15px",
                        formatter: function (e) {
                            var o;
                            return e.globals.seriesTotals.reduce(function (e, t) {
                                return o = e + t
                            }, 0), o
                        }
                    }
                }
            }
        },
        labels: ["Complete", "In Progress", "Started"]
    }, i = {
        series: [{name: "Session Duration", data: e("#overviewLineChart")}],
        chart: {height: "100%", type: "area", toolbar: !1, fontFamily: themeStyle("--font-family-default")},
        grid: {borderColor: themeStyle("--border-grey-color")},
        dataLabels: {enabled: !1},
        stroke: {lineCap: "round", colors: ["#22CCE2"], width: [4], curve: "straight"},
        fill: {type: ["solid"], colors: ["rgba(34, 204, 226, 0.15)"]},
        legend: {show: !1},
        markers: {size: 0, colors: ["#22CCE2"], strokeColors: "#FFFFFF", strokeWidth: 5, strokeOpacity: 1},
        xaxis: {
            categories: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan"],
            tooltip: !1,
            labels: {
                offsetY: 5,
                style: {
                    colors: themeStyle("--text-secondary-color"),
                    fontWeight: 400,
                    fontSize: "12px",
                    fontFamily: themeStyle("--font-family-default")
                }
            },
            axisBorder: {show: !0, color: themeStyle("--border-grey-color")},
            axisTicks: {show: !1},
            crosshairs: {
                show: !0,
                width: 1,
                position: "back",
                opacity: .9,
                stroke: {color: "#B3C0CE", width: 1, dashArray: 4}
            }
        },
        yaxis: {
            labels: {
                offsetY: 50,
                style: {
                    colors: themeStyle("--text-secondary-color"),
                    fontWeight: 400,
                    fontSize: "12px",
                    fontFamily: themeStyle("--font-family-default")
                }
            }
        },
        tooltip: Charts.tooltip()
    }, a = {
        grid: {show: !1, left: "54", right: "0", top: "50", bottom: "45"},
        tooltip: Echart.tooltip(function (e) {
            var t = e.value;
            return 0 === t ? t : 1e3 < t ? t / 1e3 + "K" : t
        }),
        barGap: "30%",
        legend: {
            data: ["Current", "Target"],
            left: "right",
            itemGap: 34,
            itemWidth: 8,
            itemHeight: 8,
            icon: "circle",
            textStyle: {
                fontSize: 15,
                fontFamily: themeStyle("--font-family-default"),
                color: themeStyle("--text-primary-color")
            }
        },
        color: ["#FF3D57", "#22CCE2"],
        toolbox: {show: !1},
        xAxis: [{
            type: "category",
            offset: 19,
            axisTick: {show: !1},
            data: e("#statisticsBarChart")[0],
            axisLabel: {
                fontSize: 12,
                fontFamily: themeStyle("--font-family-default"),
                color: themeStyle("--text-secondary-color")
            },
            axisLine: {lineStyle: {color: themeStyle("--border-grey-color")}}
        }],
        yAxis: [{
            type: "value",
            axisLabel: {
                fontSize: 12,
                fontFamily: themeStyle("--font-family-default"),
                color: themeStyle("--text-secondary-color"),
                margin: 21,
                formatter: function (e) {
                    return 0 === e ? e : 1e3 < e ? e / 1e3 + "K" : e
                }
            },
            splitLine: {lineStyle: {color: themeStyle("--border-grey-color")}}
        }],
        series: [{
            name: "Current",
            type: "bar",
            barGap: 0,
            data: e("#statisticsBarChart")[1],
            itemStyle: {borderRadius: [5, 5, 0, 0]}
        }, {name: "Target", type: "bar", data: e("#statisticsBarChart")[2], itemStyle: {borderRadius: [5, 5, 0, 0]}}]
    };
    new ChartProgressCircle, new Charts("revenueChart", t), new Charts("profitPieChart", o), new Echart("activityChart", r), new Charts("taskPieChart", n), new Charts("overviewLineChart", i), new Echart("statisticsBarChart", a)
}

function Chat() {
    var t = this;
    this.chat = document.querySelector(".chat-grid"), this.buttonToggleUsers = document.querySelector(".chat-details__toggle"), this.detailsBackdrop = document.querySelector(".chat-details__backdrop"), this.userAddToggleElement = document.querySelector('[data-toggle="users-add-list"]'), this.usersNew = document.querySelectorAll(".chat-users__add-content .chat-users__item"), this.users = document.querySelectorAll(".chat-users__content .chat-users__item"), this.chat && (this.buttonToggleUsers.addEventListener("click", function (e) {
        return t.usersOpen(e)
    }), this.detailsBackdrop.addEventListener("click", function () {
        return t.usersClose()
    }), this.userAddToggleElement.addEventListener("click", function (e) {
        return t.userAddListToggle(e)
    }), this.usersNew.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return t.newUserAdd(e)
        })
    }), this.users.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return t.userAddChat(e)
        })
    }), Chat.search())
}

function HeaderSearch() {
    var t = this;
    this.toggleButton = document.querySelector(".header__toggle-search"), this.search = document.querySelector(".header__search"), this.toggleButton && (this.input = this.search.querySelector(".form-search__input"), this.toggleButton.addEventListener("click", function (e) {
        return t.toggle(e)
    }), document.addEventListener("click", function (e) {
        !t.toggleButton.classList.contains("active") || e.target.closest(".header__search") || e.target.closest(".header__toggle-search") || (t.toggleButton.classList.remove("active"), t.search.classList.remove("show"), setTimeout(function () {
            t.input.blur(), t.input.value = ""
        }, 200))
    }))
}

function ModuleSearch() {
    var r = this;
    this.toggleButton = document.querySelectorAll(".toggle-search--module"), this.getActiveElement = null, this.search = null, this.input = null, this.toggleButton[0] && (this.toggleButton.forEach(function (e, o) {
        e.addEventListener("click", function (e) {
            var t = e.currentTarget;
            e.preventDefault(), r.getActiveElement = o, r.search = document.querySelector(t.getAttribute("data-search")), r.input = r.search.querySelector(".input"), e.currentTarget.classList.toggle("active"), r.search.classList.toggle("show"), t.classList.contains("active") ? r.input.focus() : setTimeout(function () {
                r.input.blur(), r.input.value = ""
            }, 200)
        })
    }), document.addEventListener("click", function (e) {
        null !== r.getActiveElement && r.search.classList.contains("show") && (!r.toggleButton[r.getActiveElement].classList.contains("active") || e.target.closest(".module-search") || e.target.closest(".toggle-search--module") || (r.toggleButton[r.getActiveElement].classList.remove("active"), r.search.classList.remove("show"), setTimeout(function () {
            r.input.blur(), r.input.value = ""
        }, 200)))
    }))
}

function Sidebar() {
    var t = this;
    this.button = document.querySelector(".header__toggle-menu"), this.sidebar = document.querySelector(".sidebar"), this.backdrop = document.querySelector(".sidebar__backdrop"), this.backdropDesktop = document.querySelector(".sidebar-backdrop"), this.body = document.querySelector("body"), this.button && (this.button.addEventListener("click", function (e) {
        return t.toggle(e)
    }), this.backdrop.addEventListener("click", function (e) {
        return t.close(e)
    }), this.backdropDesktop.addEventListener("click", function (e) {
        return t.close(e, !0)
    }))
}

function SidebarPanel() {
    var t = this;
    this.buttonToggleElement = document.querySelector(".js-toggle-sidebar-panel"), this.dismissElement = document.querySelector(".backdrop-sidebar-panel"), this.sidebar = null, this.buttonToggleElement && (this.buttonToggleElement.addEventListener("click", function (e) {
        return t.sidebarShow(e)
    }), this.dismissElement.addEventListener("click", function () {
        return t.sidebarClose()
    }))
}

function Inbox() {
    var t = this;
    this.inbox = document.querySelector(".inbox-grid"), this.detailsDismiss = document.querySelectorAll(".inbox-details [data-dismiss]"), this.mailItems = document.querySelectorAll(".inbox-mails__item"), this.inbox && (this.mailItems.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return t.detailsOpen(e)
        })
    }), this.detailsDismiss.forEach(function (e) {
        e.addEventListener("click", function () {
            return t.detailsClose()
        })
    }), Inbox.search())
}

function ImageUpload() {
    var o = this;
    this.dropElement = document.querySelectorAll(".image-upload"), this.dropElement && this.dropElement.forEach(function (t) {
        t.querySelector(".image-upload__drop").addEventListener("click", function () {
            triggerEvent("click", t.querySelector('[type="file"]'), !1)
        }), ["change", "drop"].forEach(function (e) {
            t.addEventListener(e, function (e) {
                return o.selectHandler(e)
            }, !1)
        }), ["dragover", "dragleave"].forEach(function (e) {
            t.addEventListener(e, function (e) {
                return o.dragHover(e)
            }, !1)
        })
    })
}

function ProfileUpload() {
    var o = this;
    this.dropElement = document.querySelectorAll(".js-profile-upload"), this.dropElement && this.dropElement.forEach(function (t) {
        t.addEventListener("click", function () {
            triggerEvent("click", t.querySelector('[type="file"]'), !1)
        }), ["change", "drop"].forEach(function (e) {
            t.addEventListener(e, function (e) {
                return o.selectHandler(e)
            }, !1)
        }), ["dragover", "dragleave"].forEach(function (e) {
            t.addEventListener(e, function (e) {
                return o.dragHover(e)
            }, !1)
        })
    })
}

function map() {
    var e = document.querySelector("#mapCountry");
    e && $(e).vectorMap({
        map: "world_en",
        backgroundColor: null,
        color: themeStyle("--grey-color-4", "--black-color-3"),
        enableZoom: !1,
        showTooltip: !1,
        selectedColor: null,
        hoverColor: !1,
        colors: {ru: "#FDBF5E", cn: "#FF3D57", au: "#22CCE2", us: "#09B66D"},
        onRegionClick: function (e) {
            e.preventDefault()
        }
    })
}

function Modal() {
    this.modal = document.querySelector(".modal"), this.modal && (this.toggle = document.querySelectorAll("[data-modal]"), this.closeTrigger = document.querySelectorAll('[data-dismiss="modal"]'), this.events())
}

function OrderTabs() {
    if (this.element = document.querySelector(".order-tabs"), this.element) {
        this.elementSlider = this.element.querySelector(".order-tabs__list-wrapper"), this.navButton = this.element.querySelectorAll(".order-tabs__arrow");
        new Swiper(this.elementSlider, {
            slidesPerView: "auto",
            navigation: {prevEl: this.navButton[0], nextEl: this.navButton[1]},
            on: {
                init: function () {
                    var o = this;
                    document.querySelectorAll(".order-tabs__item").forEach(function (e, t) {
                        e.querySelector(".order-tabs__link").classList.contains("order-tabs__link--active") && o.slideTo(t, 0)
                    })
                }
            }
        })
    }
}

function AddProduct() {
    if (this.element = document.querySelector("#addProductSlider"), this.element) {
        this.mainSliderElement = this.element.querySelector(".add-product__gallery-slider"), this.thumbsSliderElement = this.element.querySelector(".add-product__thumbs-slider"), this.thumbsNavButton = this.element.querySelectorAll(".add-product__thumbs-arrow");
        var e = new Swiper(this.thumbsSliderElement, {
            direction: "vertical",
            slidesPerView: "auto",
            watchSlidesVisibility: !0,
            watchSlidesProgress: !0,
            lazy: !0,
            navigation: {prevEl: this.thumbsNavButton[0], nextEl: this.thumbsNavButton[1]}
        });
        new Swiper(this.mainSliderElement, {
            effect: "fade",
            speed: 500,
            slidesPerView: 1,
            simulateTouch: !1,
            allowTouchMove: !1,
            lazy: !0,
            thumbs: {swiper: e}
        })
    }
}

function Checkboxes() {
    this.element = document.querySelectorAll(".js-checkbox-all"), this.element[0] && this.events()
}

function Timeline() {
    this.options = {
        columnWidth: ".page-timeline__items-size",
        itemSelector: ".timeline-item",
        gutter: ".page-timeline__items-spacer",
        horizontalOrder: !0,
        transitionDuration: 0
    }, this.elements = document.querySelectorAll(".page-timeline__items")
}

function Todo() {
    var t = this;
    this.item = document.querySelectorAll(".todo-panel"), this.item[0] && this.item.forEach(function (e) {
        e.querySelector('[data-checkbox="todo-panel"]').addEventListener("click", function (e) {
            return t.checked(e)
        })
    })
}

function SwitcherGroup() {
    var t = this;
    this.element = document.querySelectorAll(".switcher-button"), this.floatElement = document.querySelectorAll(".switcher-button__float"), this.element[0] && (this.floatElementPosition(), window.addEventListener("resize", function () {
        return t.floatElementPosition()
    }), this.element.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return t.toggle(e)
        })
    }))
}

function CheckboxToggle() {
    var t = this;
    this.checkbox = document.querySelectorAll(".checkbox-toggle"), this.checkbox[0] && (this.checkbox.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return t.toggle(e)
        })
    }), this.toggle = function (e) {
        var t = e.currentTarget;
        e.preventDefault(), t.classList.toggle("is-active")
    })
}

function formEditor() {
    var e = Quill.import("ui/icons"), t = ".js-description-editor";
    if (e.bold = '<svg viewBox="0 0 18 18"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.2184 9.48564C13.7071 8.88901 12.9487 8.47436 11.9429 8.24137C12.6478 7.91749 13.0739 7.69877 13.2216 7.58519C13.5795 7.31811 13.8494 7.01975 14.0309 6.69026C14.2128 6.36064 14.3036 5.99703 14.3036 5.59936C14.3036 5.23008 14.2441 4.88351 14.1246 4.55963C14.0053 4.23568 13.8207 3.94025 13.5707 3.67323C13.315 3.40628 13.0253 3.19025 12.7014 3.02547C12.4002 2.8778 12.1275 2.76702 11.8832 2.69317C11.298 2.53974 10.7554 2.46302 10.2554 2.46302H9.62473C9.51113 2.46302 9.3959 2.46159 9.27945 2.45872L9.18214 2.45646L9.09635 2.45454C9.06802 2.45454 9.02817 2.45604 8.97689 2.45875C8.92575 2.46162 8.88587 2.46305 8.85751 2.46305L8.47393 2.47162L5.23544 2.5824L3.01961 2.63356L3.0537 3.34088C3.5309 3.40344 3.8549 3.44049 4.02529 3.45177C4.31505 3.46882 4.51107 3.51153 4.61338 3.57962C4.67594 3.62514 4.71003 3.6592 4.71571 3.68193C4.77248 3.80691 4.80365 4.11654 4.80944 4.61091C4.83213 5.45184 4.85777 6.59954 4.8861 8.05403L4.90314 12.2897C4.90314 13.0169 4.87762 13.5682 4.82648 13.9431C4.80377 14.0795 4.74404 14.2244 4.64747 14.3779C4.38609 14.4856 4.03669 14.5739 3.59919 14.642C3.4686 14.659 3.27537 14.693 3.01973 14.7444L3.00269 15.5455C4.36057 15.4999 5.13326 15.4688 5.32099 15.4516C6.53678 15.3777 7.38348 15.3466 7.8607 15.3578L9.53958 15.3919C10.1989 15.4145 10.7613 15.3832 11.2272 15.2981C11.9657 15.1618 12.5423 14.9912 12.9573 14.7866C13.3776 14.5821 13.7753 14.2752 14.1502 13.8662C14.4346 13.5538 14.636 13.2214 14.7554 12.869C14.9201 12.3862 15.0025 11.9289 15.0025 11.497C15.0026 10.7585 14.7413 10.0879 14.2184 9.48564ZM7.54536 3.44338C7.98852 3.36953 8.35784 3.33261 8.65327 3.33261C9.6248 3.33261 10.3494 3.54572 10.8266 3.9718C11.3092 4.39784 11.5508 4.92915 11.5508 5.56545C11.5508 6.46892 11.2981 7.10524 10.7924 7.47453C10.2868 7.84379 9.53676 8.0285 8.5425 8.0285C8.16751 8.0285 7.85786 8.00866 7.6136 7.96889C7.60784 7.77567 7.605 7.55695 7.605 7.31259L7.6136 6.47739C7.61921 5.58545 7.60217 4.79288 7.56244 4.09959C7.55102 3.91213 7.54536 3.69353 7.54536 3.44338ZM10.767 14.2499C11.2498 14.0169 11.5965 13.6958 11.8067 13.2868C12.0224 12.8891 12.1304 12.375 12.1306 11.7445C12.1306 11.0967 12.0141 10.5854 11.7812 10.2103C11.4516 9.67621 11.051 9.3183 10.5795 9.13633C10.1249 8.95457 9.42327 8.86364 8.4744 8.86364C8.05399 8.86364 7.76703 8.892 7.6136 8.94881V10.1761L7.605 11.6505L7.6305 13.9516C7.63062 14.0368 7.66473 14.1621 7.73291 14.3267C8.1647 14.5085 8.56244 14.5993 8.92608 14.5993C9.67029 14.5993 10.284 14.4829 10.767 14.2499Z"/></svg>', e.italic = '<svg viewBox="0 0 18 18"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.0596 2.47589C12.8608 2.49016 12.6675 2.50302 12.48 2.51431C11.6391 2.56532 11.031 2.59096 10.6561 2.59096C10.4629 2.59096 10.2555 2.5852 10.034 2.57392L7.3324 2.45454L7.17043 3.3324C7.2272 3.34368 7.3352 3.35515 7.49431 3.36652C8.07945 3.40049 8.48859 3.48013 8.72154 3.60512V3.929L8.65336 4.35503L8.4659 5.50561L8.32948 6.04257L8.08231 7.3806C8.08231 7.38636 8.07234 7.41905 8.05246 7.47873C8.03259 7.53833 8.00697 7.62496 7.9758 7.73857C7.9445 7.85228 7.90906 7.9844 7.86921 8.13493C7.82936 8.28544 7.78396 8.47586 7.73279 8.70598C7.68165 8.93604 7.63332 9.17616 7.58792 9.42611L7.48559 9.97161L7.0084 12.2557L6.77825 13.4401C6.71003 13.8039 6.59364 14.0909 6.42887 14.3009C6.20158 14.4146 5.87203 14.5253 5.44021 14.6335C5.02546 14.7413 4.80674 14.7982 4.78403 14.8039L4.63916 15.5284C4.77543 15.5171 5.05382 15.4916 5.47433 15.4516C6.23 15.3835 6.7243 15.3523 6.9572 15.3579L8.64474 15.3748C9.36053 15.4489 9.77241 15.497 9.88029 15.5199C9.98827 15.5368 10.0679 15.5455 10.1189 15.5455C10.2213 15.5455 10.3405 15.5398 10.4769 15.5284C10.5053 15.5228 10.5707 15.5199 10.6729 15.5199C10.6842 15.4632 10.7098 15.3466 10.7496 15.1704C10.7835 15.0056 10.8034 14.8408 10.8093 14.676C10.6387 14.6476 10.4513 14.6192 10.2466 14.5909C9.93429 14.5569 9.59606 14.4971 9.23238 14.412C9.21555 14.2983 9.21264 14.2216 9.22399 14.1818L9.32638 13.7984L9.6929 11.7956L10.0167 10.449L10.5367 7.79843C10.6616 7.19045 10.8491 6.32128 11.0993 5.19047C11.1221 4.97459 11.1588 4.7416 11.2101 4.49157C11.2782 4.16775 11.3466 3.9178 11.4146 3.74157C11.6249 3.6564 11.9119 3.56837 12.2754 3.47744C12.5825 3.40936 12.892 3.32127 13.2044 3.21332C13.2386 3.08831 13.2757 2.94344 13.3153 2.77867C13.3382 2.67063 13.3552 2.56275 13.3664 2.45484C13.3608 2.45463 13.2584 2.46171 13.0596 2.47589Z"/></svg>', e.underline = '<svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">\n    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.11641 3.59642C3.97446 3.39236 3.55689 3.2815 2.86366 3.26442C2.65343 3.25314 2.52557 3.24174 2.48017 3.23051L2.45459 2.48048C2.52838 2.47475 2.64202 2.47201 2.79546 2.47201C3.13635 2.47201 3.45456 2.48332 3.74999 2.50601C4.49999 2.54586 4.97155 2.56562 5.16477 2.56562C5.65336 2.56562 6.13058 2.5572 6.59662 2.54013C7.25569 2.51741 7.67053 2.5032 7.84092 2.49753C8.15912 2.49753 8.40339 2.4918 8.57379 2.48045L8.56533 2.59983L8.58235 3.14523V3.22195C8.24145 3.27308 7.88925 3.2986 7.52552 3.2986C7.18462 3.2986 6.96026 3.36962 6.85217 3.51171C6.77835 3.59129 6.74142 3.96622 6.74142 4.63663C6.74142 4.7106 6.74285 4.80275 6.74572 4.91353C6.74856 5.0243 6.75002 5.09678 6.75002 5.13075L6.7587 7.08222L6.87803 9.46842C6.91214 10.173 7.05706 10.7471 7.31267 11.1901C7.51154 11.5254 7.78423 11.7867 8.13079 11.9741C8.63085 12.2413 9.13345 12.3747 9.6393 12.3747C10.2301 12.3747 10.7726 12.2953 11.267 12.1361C11.5853 12.0338 11.8665 11.889 12.1106 11.7016C12.3834 11.4969 12.5681 11.3152 12.6649 11.156C12.8692 10.8379 13.02 10.5139 13.1164 10.1843C13.2357 9.76959 13.2954 9.11926 13.2954 8.23287C13.2954 7.78401 13.2854 7.4204 13.2656 7.14191C13.2458 6.86359 13.2145 6.51556 13.1718 6.09794C13.1291 5.68039 13.0909 5.22735 13.0566 4.73875L13.0226 4.2358C12.9943 3.85511 12.926 3.6052 12.8181 3.48589C12.6249 3.28699 12.4061 3.19036 12.162 3.19604L11.3097 3.21305L11.1903 3.18756L11.2074 2.45454H11.9233L13.6704 2.53974C14.1022 2.55675 14.659 2.52842 15.3408 2.45454L15.4943 2.47159C15.5285 2.68738 15.5453 2.83231 15.5453 2.90616C15.5453 2.94601 15.5342 3.03407 15.5112 3.17039C15.2556 3.23845 15.017 3.2755 14.7953 3.28117C14.3805 3.34368 14.1562 3.39207 14.122 3.42613C14.0368 3.51126 13.9941 3.62783 13.9941 3.77556C13.9941 3.81538 13.9984 3.89195 14.007 4.00565C14.0153 4.11926 14.0197 4.20735 14.0197 4.26977C14.0651 4.37774 14.1278 5.50266 14.2072 7.64478C14.2413 8.75263 14.1986 9.61658 14.0793 10.2358C13.9941 10.6673 13.8774 11.014 13.7297 11.2753C13.5139 11.6447 13.1959 11.9942 12.7752 12.3236C12.3492 12.6475 11.8321 12.9004 11.2243 13.0822C10.6048 13.2698 9.88031 13.3633 9.05086 13.3633C8.10208 13.3633 7.29527 13.2327 6.6305 12.9714C5.95444 12.7045 5.44582 12.3577 5.10504 11.9316C4.75847 11.4999 4.52271 10.9458 4.39757 10.2697C4.30668 9.81514 4.26131 9.14195 4.26131 8.24983V5.41173C4.26131 4.34362 4.21295 3.73863 4.11641 3.59642ZM2.72728 14.4547H15.2723C15.352 14.4547 15.4174 14.4803 15.4685 14.5315C15.5195 14.5826 15.545 14.6479 15.545 14.7275V15.2728C15.545 15.3525 15.5195 15.4178 15.4685 15.4689C15.4174 15.52 15.352 15.5455 15.2723 15.5455H2.72728C2.64763 15.5455 2.58238 15.52 2.53125 15.4689C2.48017 15.4178 2.45459 15.3525 2.45459 15.2728V14.7275C2.45459 14.6479 2.48005 14.5826 2.53125 14.5315C2.58238 14.4802 2.64775 14.4547 2.72728 14.4547Z" /></svg>', e.align.left = '<svg viewBox="0 0 22 22"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.9474 6.59037H3.57624C3.42021 6.59037 3.28519 6.55102 3.17104 6.47236C3.05704 6.39363 3 6.30048 3 6.19282V5.39762C3 5.28995 3.05704 5.19672 3.17101 5.11802C3.28509 5.03943 3.42009 5 3.57624 5H13.9474C14.1035 5 14.2388 5.03943 14.3528 5.11802C14.4667 5.19681 14.5238 5.28995 14.5238 5.39762V6.19282C14.5238 6.3005 14.4667 6.39365 14.3528 6.47236C14.2387 6.55102 14.1035 6.59037 13.9474 6.59037ZM17.2858 10.0604H3.57147C3.41674 10.0604 3.28283 10.021 3.16962 9.94225C3.05657 9.86367 3 9.77041 3 9.66277V8.86756C3 8.75988 3.05657 8.66669 3.16959 8.58803C3.28273 8.50933 3.41661 8.47001 3.57147 8.47001H17.2858C17.4405 8.47001 17.5744 8.50933 17.6875 8.58803C17.8005 8.66671 17.857 8.75981 17.857 8.86756V9.66277C17.857 9.77041 17.8005 9.86367 17.6875 9.94225C17.5744 10.021 17.4405 10.0604 17.2858 10.0604ZM18.8303 15.5277C18.7171 15.449 18.583 15.4096 18.4284 15.4096H3.57147C3.41661 15.4096 3.28273 15.449 3.16959 15.5277C3.05657 15.6064 3 15.6996 3 15.8072V16.6024C3 16.71 3.05657 16.8032 3.16962 16.8821C3.28286 16.9607 3.4168 17 3.5715 17H18.4284C18.583 17 18.7171 16.9607 18.8303 16.8821C18.9433 16.8033 19 16.71 19 16.6024V15.8072C18.9999 15.6996 18.9433 15.6064 18.8303 15.5277ZM15 13.5301H3.57147C3.41674 13.5301 3.28283 13.4908 3.16962 13.4121C3.05657 13.3335 3 13.2402 3 13.1326V12.3374C3 12.2298 3.05657 12.1365 3.16959 12.0579C3.28273 11.9792 3.41661 11.9398 3.57147 11.9398H15C15.1547 11.9398 15.2887 11.9792 15.4017 12.0579C15.5148 12.1365 15.5715 12.2298 15.5715 12.3374V13.1325C15.5715 13.2402 15.5148 13.3334 15.4017 13.412C15.2887 13.4907 15.1547 13.5301 15 13.5301Z"/></svg>', e.align.center = '<svg viewBox="0 0 22 22"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.1571 6.59037H7.55718C7.45789 6.59037 7.37196 6.55102 7.29932 6.47236C7.22678 6.39363 7.19048 6.30048 7.19048 6.19282V5.39762C7.19048 5.28995 7.22678 5.19672 7.29931 5.11802C7.37191 5.03943 7.45782 5 7.55718 5H14.1571C14.2564 5 14.3424 5.03943 14.415 5.11802C14.4875 5.19681 14.5238 5.28995 14.5238 5.39762V6.19282C14.5238 6.3005 14.4875 6.39365 14.415 6.47236C14.3424 6.55102 14.2564 6.59037 14.1571 6.59037ZM17.143 10.0604H4.57147C4.42964 10.0604 4.30689 10.021 4.20311 9.94225C4.09948 9.86367 4.04762 9.77041 4.04762 9.66277V8.86756C4.04762 8.75988 4.09948 8.66669 4.20308 8.58803C4.30679 8.50933 4.42952 8.47001 4.57147 8.47001H17.143C17.2849 8.47001 17.4076 8.50933 17.5113 8.58803C17.6149 8.66671 17.6667 8.75981 17.6667 8.86756V9.66277C17.6667 9.77041 17.6149 9.86367 17.5113 9.94225C17.4076 10.021 17.2848 10.0604 17.143 10.0604ZM18.8303 15.5277C18.7171 15.449 18.583 15.4096 18.4284 15.4096H3.57147C3.41661 15.4096 3.28273 15.449 3.16959 15.5277C3.05657 15.6064 3 15.6996 3 15.8072V16.6024C3 16.71 3.05657 16.8032 3.16962 16.8821C3.28286 16.9607 3.4168 17 3.5715 17H18.4284C18.583 17 18.7171 16.9607 18.8303 16.8821C18.9433 16.8033 19 16.71 19 16.6024V15.8072C18.9999 15.6996 18.9433 15.6064 18.8303 15.5277ZM15.1429 13.5301H6.57147C6.45541 13.5301 6.35498 13.4908 6.27008 13.4121C6.18529 13.3335 6.14286 13.2402 6.14286 13.1326V12.3374C6.14286 12.2298 6.18529 12.1365 6.27005 12.0579C6.35491 11.9792 6.45533 11.9398 6.57147 11.9398H15.1429C15.2589 11.9398 15.3594 11.9792 15.4442 12.0579C15.529 12.1365 15.5715 12.2298 15.5715 12.3374V13.1325C15.5715 13.2402 15.529 13.3334 15.4442 13.412C15.3594 13.4907 15.2588 13.5301 15.1429 13.5301Z"/></svg>', e.align.right = '<svg viewBox="0 0 22 22"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.4281 5C18.5827 5 18.7168 5.03943 18.8299 5.11802C18.9429 5.19678 18.9996 5.28995 18.9996 5.39762V6.19282C18.9996 6.3005 18.9429 6.39365 18.8299 6.47236C18.7167 6.55102 18.5826 6.59037 18.4281 6.59037H8.1426C7.98783 6.59037 7.85392 6.55104 7.74075 6.47236C7.62764 6.39363 7.57106 6.30048 7.57106 6.19282V5.39762C7.57106 5.28995 7.62764 5.19672 7.74075 5.11802C7.8538 5.03943 7.98773 5 8.1426 5H18.4281ZM18.4283 8.47001H4.71424C4.55937 8.47001 4.42543 8.50933 4.31239 8.58803C4.19927 8.66669 4.14277 8.75988 4.14277 8.86756V9.66277C4.14277 9.77041 4.19927 9.86367 4.31239 9.94225C4.42556 10.021 4.55937 10.0604 4.71424 10.0604H18.4283C18.5829 10.0604 18.717 10.021 18.8302 9.94225C18.9431 9.86367 18.9998 9.77041 18.9998 9.66277V8.86756C18.9998 8.75981 18.9431 8.66671 18.8302 8.58803C18.717 8.50933 18.5829 8.47001 18.4283 8.47001ZM6.99977 11.9399H18.4281C18.5827 11.9399 18.7168 11.9792 18.83 12.058C18.943 12.1366 18.9997 12.2299 18.9997 12.3375V13.1326C18.9997 13.2403 18.943 13.3335 18.83 13.4121C18.7168 13.4908 18.5827 13.5303 18.4281 13.5303H6.99977C6.845 13.5303 6.71112 13.4908 6.59792 13.4121C6.48481 13.3335 6.4283 13.2402 6.4283 13.1326V12.3375C6.4283 12.2299 6.48477 12.1366 6.59792 12.058C6.71103 11.9793 6.8449 11.9399 6.99977 11.9399ZM3.57147 15.4096H18.4284C18.583 15.4096 18.7171 15.449 18.8303 15.5277C18.9433 15.6064 19 15.6996 19 15.8072V16.6024C19 16.71 18.9433 16.8033 18.8303 16.8821C18.7171 16.9607 18.583 17 18.4284 17H3.5715C3.4168 17 3.28286 16.9607 3.16962 16.8821C3.05657 16.8032 3 16.71 3 16.6024V15.8072C3 15.6996 3.05657 15.6064 3.16959 15.5277C3.28273 15.449 3.41661 15.4096 3.57147 15.4096Z" /></svg>', e.align.justify = '<svg viewBox="0 0 22 22"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.8303 5.11802C18.7171 5.03943 18.583 5 18.4284 5H3.57147C3.41661 5 3.28273 5.03943 3.16959 5.11802C3.05657 5.19672 3 5.28995 3 5.39762V6.19282C3 6.30048 3.05657 6.39363 3.16962 6.47236C3.28286 6.55104 3.4168 6.59037 3.5715 6.59037H18.4284C18.583 6.59037 18.7171 6.55102 18.8303 6.47236C18.9433 6.39365 19 6.3005 19 6.19282V5.39762C18.9999 5.28995 18.9433 5.19678 18.8303 5.11802ZM3.57147 11.9399H18.4284C18.583 11.9399 18.7171 11.9792 18.8303 12.058C18.9433 12.1366 19 12.2299 19 12.3375V13.1326C19 13.2403 18.9433 13.3335 18.8303 13.4121C18.7171 13.4908 18.583 13.5303 18.4284 13.5303H3.5715C3.4168 13.5303 3.28286 13.4908 3.16962 13.4121C3.05657 13.3335 3 13.2402 3 13.1326V12.3375C3 12.2299 3.05657 12.1366 3.16959 12.058C3.28273 11.9793 3.41661 11.9399 3.57147 11.9399ZM3.57147 15.4096H18.4284C18.583 15.4096 18.7171 15.449 18.8303 15.5277C18.9433 15.6064 19 15.6996 19 15.8072V16.6024C19 16.71 18.9433 16.8033 18.8303 16.8821C18.7171 16.9607 18.583 17 18.4284 17H3.5715C3.4168 17 3.28286 16.9607 3.16962 16.8821C3.05657 16.8032 3 16.71 3 16.6024V15.8072C3 15.6996 3.05657 15.6064 3.16959 15.5277C3.28273 15.449 3.41661 15.4096 3.57147 15.4096ZM3.57147 8.47001H18.4284C18.583 8.47001 18.7171 8.50933 18.8303 8.58803C18.9433 8.66671 19 8.75981 19 8.86756V9.66277C19 9.77041 18.9433 9.86367 18.8303 9.94225C18.7171 10.021 18.583 10.0604 18.4284 10.0604H3.5715C3.4168 10.0604 3.28286 10.021 3.16962 9.94225C3.05657 9.86367 3 9.77041 3 9.66277V8.86756C3 8.75988 3.05657 8.66669 3.16959 8.58803C3.28273 8.50933 3.41661 8.47001 3.57147 8.47001Z"/></svg>', document.querySelector(t)) new Quill(t, {
        modules: {toolbar: [[{header: [1, 2, !1]}], ["bold", "italic", "underline"], [{align: "left"}, {align: "center"}, {align: "right"}, {align: "justify"}]]},
        theme: "snow"
    })
}

function form() {
    var e = new Date, t = e.getFullYear().toString(), o = (e.getDate().toString(), e.getMonth().toString()),
        r = document.querySelector(".js-add-card-form");
    document.querySelectorAll(".js-card-number").forEach(function (e) {
        new Cleave(e, {creditCard: !0})
    }), document.querySelectorAll(".js-card-cvv").forEach(function (e) {
        new Cleave(e, {blocks: [3]})
    }), document.querySelectorAll(".js-card-date").forEach(function (e) {
        new Cleave(e, {date: !0, dateMin: "".concat(t, "-").concat(o), datePattern: ["m", "Y"]})
    }), document.querySelectorAll(".js-zip-code").forEach(function (e) {
        new Cleave(e, {numericOnly: !0, delimiter: "-", blocks: [5, 4]})
    }), document.querySelectorAll(".js-phone-number").forEach(function (e) {
        new Cleave(e, {phone: !0, delimiter: "-", phoneRegionCode: "US"})
    });
    r && r.addEventListener("submit", function (e) {
        e.preventDefault()
    }), document.querySelectorAll(".js-rating-stars").forEach(function (e) {
        var t = Boolean(e.getAttribute("data-readonly"));
        $(e).starRating({
            starShape: "rounded",
            starSize: 18,
            strokeWidth: 0,
            disableAfterRate: !1,
            useFullStars: !0,
            minRating: 1,
            readOnly: t,
            onHover: function (e, t, o) {
            },
            onLeave: function (e, t, o) {
            }
        })
    }), FilePond.registerPlugin(FilePondPluginImagePreview), FilePond.create(document.querySelector(".selector-example"), {
        labelIdle: '<svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path d="M20.6868 12.1516C20.3857 12.1516 20.0912 12.1789 19.8043 12.2258C19.0886 9.88582 16.8719 8.18182 14.2461 8.18182C11.0399 8.18182 8.44246 10.7215 8.44246 13.8535C8.44246 14.1327 8.46428 14.4076 8.50464 14.6782C8.35082 14.6596 8.19591 14.6487 8.03664 14.6487C5.857 14.6487 4.09082 16.3746 4.09082 18.5051C4.09082 20.6356 5.857 22.3636 8.03664 22.3636H12.8181V18H10.0908L14.9999 12.5455L19.909 18H17.1817V22.3636H20.6868C23.5701 22.3636 25.909 20.0771 25.909 17.2582C25.909 14.4371 23.5701 12.1516 20.6868 12.1516Z" /></svg> <span>Drag and Drop or</span> <span class="filepond--label-action text-blue">Browse</span> <span>to upload</span>',
        iconProcess: '<svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">\n        <path d="M2 18C2 26.8366 9.16344 34 18 34C26.8366 34 34 26.8366 34 18C34 9.16344 26.8366 2 18 2" stroke="#0081FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        iconRemove: '<div class="icon-wrapper"><svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><path d="M4.91 3.992C5.14252 4.21583 7.41432 6.56773 7.41432 6.56773C7.53837 6.68788 7.60068 6.84423 7.60068 7.00058C7.60068 7.15694 7.53837 7.31329 7.41432 7.43234C7.41432 7.43234 5.14252 9.78533 4.91 10.0081C4.67747 10.2319 4.25916 10.2473 4.01162 10.0081C3.76352 9.76997 3.74405 9.43696 4.01162 9.14455L6.09596 7.00058L4.01162 4.85661C3.74405 4.5642 3.76352 4.23065 4.01162 3.992C4.25916 3.75281 4.67747 3.76762 4.91 3.992Z" />\n        <path d="M9.08999 3.992C8.85747 4.21583 6.58566 6.56773 6.58566 6.56773C6.46162 6.68788 6.39931 6.84423 6.39931 7.00058C6.39931 7.15694 6.46162 7.31329 6.58566 7.43234C6.58566 7.43234 8.85747 9.78533 9.08999 10.0081C9.32251 10.2319 9.74083 10.2473 9.98837 10.0081C10.2365 9.76997 10.2559 9.43696 9.98837 9.14455L7.90402 7.00058L9.98837 4.85661C10.2559 4.5642 10.2365 4.23065 9.98837 3.992C9.74083 3.75281 9.32251 3.76762 9.08999 3.992Z" /></svg></div>'
    })
}

function Pagination() {
    var t = this;
    this.pagination = document.querySelectorAll(".pagination"), this.pagination[0] && this.pagination.forEach(function (e) {
        e.querySelectorAll(".pagination__link").forEach(function (e) {
            e.addEventListener("click", function (e) {
                return t.toggleItem(e)
            })
        })
    })
}

function ScrollTo() {
    var t = this;
    this.button = document.querySelector(".btn-scroll-page"), this.button && (ScrollTo.scrollDetect(this.button), window.addEventListener("scroll", function () {
        return ScrollTo.scrollDetect(t.button)
    }), this.button.addEventListener("click", function (e) {
        e.preventDefault(), t.scrollTo()
    }))
}

function scrolls() {
    new ScrollMagic.Controller;
    var e = document.querySelector(".header"), t = document.querySelector(".button-add");
    if (t) {
        var o = e.offsetHeight;
        gsap.to(t, {
            scrollTrigger: {
                start: o, end: "0", scrub: !0, onEnter: function () {
                }, onLeaveBack: function () {
                }
            }
        })
    }
}

function InputSelects(e) {
    this.inputs = document.querySelectorAll(e), this.inputs[0] && this.init()
}

function InputTags(e) {
    InputSelects.call(this, e)
}

function DropdownSelect(e) {
    var t = this;
    this.dropdown = e, this.dropdown && (this.input = this.dropdown.parentNode.querySelector('[data-toggle="dropdown"]'), this.items = this.dropdown.querySelectorAll(".dropdown-menu__item"), this.items.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return t.selected(e)
        })
    }))
}

function Tag() {
    this.labels = document.querySelectorAll(".tag"), this.labels && this.labels.forEach(function (e) {
        var t = e.querySelector(".tag__append");
        t && t.addEventListener("click", function (e) {
            return Tag.remove(e)
        })
    })
}

function tooltip() {
    var e = document.querySelector(".page-content");
    $('[data-toggle="tooltip"]').tooltip({
        html: !0,
        boundary: e,
        container: e,
        trigger: "click"
    }), tippy("[data-tippy-content]", {appendTo: "parent", allowHTML: !0, animation: "fade"})
}

Echart.prototype.init = function (e) {
    var t = echarts.init(this.element);
    t.setOption(e), echartsElements.push(t)
}, Echart.resize = function () {
    echartsElements.forEach(function (e) {
        return e.resize()
    })
}, Echart.tooltip = function (r) {
    return {
        trigger: "axis", axisPointer: {type: "shadow"}, formatter: function (e) {
            var t = document.createElement("div"), o = "";
            return t.className = "chart-tooltip-custom", e.forEach(function (e) {
                var t = r ? r(e) : e.value;
                o += '\n                    <span class="chart-tooltip-custom__marker">'.concat(e.marker, '</span>\n                    <span class="chart-tooltip-custom__value">').concat(t, '</span>\n                    <span class="chart-tooltip-custom__separate-item"></span>\n                ')
            }), t.innerHTML = '\n                <div class="chart-tooltip-custom__items">'.concat(o, '</div>\n                <div class="chart-tooltip-custom__title">').concat(e[0].name, "</div>\n            "), t
        }, position: function (e, t, o, r, n) {
            var i = e[1] <= n.contentSize[1] + 30 ? 40 : e[1] - n.contentSize[1] - 10,
                a = n.viewSize[0] - e[0] <= n.contentSize[0] / 2, s = e[0] <= n.contentSize[0] / 2;
            return a ? {right: 0, top: i} : s ? {left: 0, top: i} : {left: e[0] - n.contentSize[0] / 2, top: i}
        }, extraCssText: "padding: 0; border: none"
    }
}, Chat.prototype.usersOpen = function (e) {
    e.currentTarget.classList.add("active"), this.chat.classList.add("chat-grid--show-users")
}, Chat.prototype.usersClose = function () {
    var e = this;
    this.chat.classList.remove("chat-grid--show-users"), setTimeout(function () {
        e.chat.classList.remove("chat-grid--show-users-add")
    }, 300), this.buttonToggleUsers.classList.remove("active")
}, Chat.prototype.userAddListToggle = function (e) {
    e.currentTarget.classList.toggle("active"), this.chat.classList.toggle("chat-grid--show-users-add")
}, Chat.prototype.newUserAdd = function (e) {
    var t = e.currentTarget;
    this.usersNew.forEach(function (e) {
        return e.classList.remove("active")
    }), t.classList.add("active"), this.userAddToggleElement.classList.remove("active"), this.chat.classList.remove("chat-grid--show-users-add")
}, Chat.prototype.userAddChat = function (e) {
    var t = e.currentTarget;
    this.users.forEach(function (e) {
        return e.classList.remove("active")
    }), t.classList.add("active"), this.chat.classList.remove("chat-grid--show-users"), this.buttonToggleUsers.classList.remove("active")
}, Chat.search = function () {
}, HeaderSearch.prototype.toggle = function (e) {
    var t = this;
    e.preventDefault();
    var o = e.currentTarget;
    e.currentTarget.classList.toggle("active"), this.search.classList.toggle("show"), o.classList.contains("active") ? this.input.focus() : setTimeout(function () {
        t.input.blur(), t.input.value = ""
    }, 200)
}, Sidebar.prototype.toggle = function (e) {
    var t, o = this, r = e.currentTarget;
    e.preventDefault(), r.classList.toggle("active"), this.body.classList.toggle("sidebar-show"), this.body.classList.toggle("sidebar-collapse"), this.sidebar.classList.toggle("sidebar--show"), this.sidebar.classList.toggle("sidebar--translate"), t = setInterval(function () {
        timeline.resize()
    }), setTimeout(function () {
        clearInterval(t), Echart.resize()
    }, 310), this.body.classList.contains("sidebar-active") ? setTimeout(function () {
        o.body.classList.remove("sidebar-active")
    }, 300) : this.body.classList.add("sidebar-active")
}, Sidebar.prototype.close = function (e, t) {
    var o = this;
    e.preventDefault(), this.body.classList.remove("sidebar-show"), this.body.classList.remove("sidebar-collapse"), this.button.classList.remove("active"), this.sidebar.classList.remove("sidebar--translate"), setTimeout(function () {
        o.body.classList.remove("sidebar-active")
    }, 300), t ? this.sidebar.classList.remove("sidebar--show") : setTimeout(function () {
        o.sidebar.classList.remove("sidebar--show")
    }, 300)
}, SidebarPanel.prototype.sidebarShow = function (e) {
    var t = e.currentTarget;
    t.classList.add("active"), this.dismissElement.classList.add("active"), this.sidebar = document.querySelector(t.getAttribute("data-toggle")), this.sidebar.classList.add("active")
}, SidebarPanel.prototype.sidebarClose = function () {
    this.buttonToggleElement.classList.remove("active"), this.dismissElement.classList.remove("active"), this.sidebar.classList.remove("active")
}, Inbox.prototype.detailsOpen = function (e) {
    var t = e.currentTarget;
    this.mailItems.forEach(function (e) {
        return e.classList.remove("active")
    }), t.classList.add("active"), this.inbox.classList.add("inbox-grid--show-details")
}, Inbox.prototype.detailsClose = function () {
    this.inbox.classList.remove("inbox-grid--show-details")
}, Inbox.search = function () {
}, ImageUpload.prototype.dragHover = function (e) {
    var t = e.currentTarget;
    e.stopPropagation(), e.preventDefault(), "dragover" === e.type ? t.classList.add("highlight") : t.classList.remove("highlight")
}, ImageUpload.prototype.selectHandler = function (t) {
    var o = this, e = t.target.files || t.dataTransfer.files;
    this.dragHover(t), e.forEach(function (e) {
        o.parseFile(e, t.currentTarget), o.uploadFile(e)
    })
}, ImageUpload.prototype.parseFile = function (e, t) {
    var o = t, r = o.closest(".image-upload").querySelector(".image-upload__list"),
        n = o.closest(".image-upload").querySelectorAll(".image-upload__item:not(.is-active)"),
        i = document.createElement("li"), a = document.createElement("div");
    i.classList = "image-upload__item", i.innerHTML = '<div class="image-upload__progress">\n                                <div class="image-upload__progress-icon"></div>\n                            </div>\n                            <div class="image-upload__action-remove">\n                                <svg class="icon-icon-cross">\n                                    <use xlink:href="#icon-cross"></use>\n                                </svg>\n                            </div>', n.length < 2 && r.appendChild(i), a.classList = "image-upload__preview-image", n[0].appendChild(a), a.style.backgroundImage = "url(".concat(URL.createObjectURL(e), ")"), n[0].querySelector(".image-upload__preview-image").addEventListener("click", function (e) {
        return ImageUpload.removeItem(e, n)
    }), n[0].classList.add("is-active")
}, ImageUpload.prototype.uploadFile = function (e) {
    var t = new XMLHttpRequest;
    e.size <= 1073741824 && t.addEventListener("readystatechange", function () {
        4 === t.readyState && t.status
    })
}, ImageUpload.removeItem = function (e, t) {
    var o = e.target, r = o.parentNode.parentNode, n = o.parentNode, i = r.querySelectorAll(".image-upload__item");
    n.classList.remove("is-active"), 5 < i.length && t[0].remove(), n.classList.contains("image-upload__item--added") && n.remove(), o.remove()
}, ProfileUpload.prototype.dragHover = function (e) {
    var t = e.currentTarget;
    e.stopPropagation(), e.preventDefault(), "dragover" === e.type ? t.classList.add("highlight") : t.classList.remove("highlight")
}, ProfileUpload.prototype.selectHandler = function (e) {
    var t = e.currentTarget, o = e.target.files || e.dataTransfer.files, r = t.querySelector(".profile-upload__image");
    if (this.dragHover(e), o && o[0]) {
        var n = new FileReader;
        n.onload = function (e) {
            r.setAttribute("xlink:href", "".concat(e.target.result))
        }, n.onloadend = function (e) {
            t.classList.add("is-animate"), setTimeout(function () {
                t.classList.add("filled")
            }, 100), setTimeout(function () {
                t.classList.remove("is-animate")
            }, 300)
        }, n.readAsDataURL(o[0])
    }
}, Modal.prototype.events = function () {
    this.toggle.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return Modal.show(e)
        })
    }), this.closeTrigger.forEach(function (e) {
        e.addEventListener("click", function (e) {
            return Modal.close(e)
        })
    })
}, Modal.toggleClass = function (e) {
    e.classList.add("is-active"), e.classList.add("is-animate")
}, Modal.show = function (e) {
    var t = e.currentTarget.getAttribute("data-modal"), o = document.querySelector(t);
    e.preventDefault(), e.target.closest(".modal") ? setTimeout(function () {
        Modal.toggleClass(o)
    }, 300) : Modal.toggleClass(o)
}, Modal.close = function (e) {
    var t = e.target.closest(".modal");
    t.classList.remove("is-animate"), setTimeout(function () {
        t.classList.remove("is-active")
    }, 310)
}, Checkboxes.prototype.events = function () {
    var r = this, n = [];
    this.element.forEach(function (e) {
        var t = e, o = document.querySelectorAll('[data-checkbox="'.concat(t.getAttribute("data-checkbox-all"), '"]'));
        n.push(o), e.addEventListener("click", function (e) {
            return r.checkedAll(e)
        })
    }), n.forEach(function (e) {
        e.forEach(function (e) {
            e.addEventListener("click", function (e) {
                return r.checkedInput(e)
            })
        })
    })
}, Checkboxes.prototype.checkedAll = function (e) {
    var t = e.currentTarget,
        o = document.querySelectorAll('[data-checkbox="'.concat(t.getAttribute("data-checkbox-all"), '"]')), r = [];
    o.forEach(function (e) {
        var t = e;
        t.checked ? r.push(e) : triggerEvent("click", t)
    }), r.length === o.length ? (t.checked = !1, o.forEach(function (e) {
        triggerEvent("click", e)
    })) : t.checked = !0
}, Checkboxes.prototype.checkedInput = function (e) {
    var t = e.currentTarget,
        o = document.querySelector('[data-checkbox-all="'.concat(t.getAttribute("data-checkbox"), '"]')),
        r = document.querySelectorAll('[data-checkbox="'.concat(o.getAttribute("data-checkbox-all"), '"]')), n = [];
    r.forEach(function (e) {
        var t = e;
        t.checked && n.push(t)
    }), n.length === r.length ? o.checked = !0 : o.checked = !1
}, Timeline.prototype.init = function () {
    var o = this;
    this.elements[0] && this.elements.forEach(function (e) {
        var t = e;
        new Masonry(t, o.options).once("layoutComplete", function () {
            t.classList.add("load")
        })
    })
}, Timeline.prototype.resize = function () {
    var t = this;
    this.elements[0] && this.elements.forEach(function (e) {
        new Masonry(e, t.options)
    })
}, Todo.prototype.checked = function (e) {
    var t = e.currentTarget, o = t.closest(".todo-panel");
    t.checked ? o.classList.add("todo-panel--checked") : o.classList.remove("todo-panel--checked")
}, SwitcherGroup.getWidth = function (e, t) {
    var o = e;
    setTimeout(function () {
        o.style.width = "".concat(t.offsetWidth, "px"), o.style.transform = "translateX(".concat(t.offsetLeft, "px)")
    })
}, SwitcherGroup.prototype.floatElementPosition = function () {
    this.floatElement.forEach(function (e) {
        var t = e, o = t.closest(".switcher-button").querySelector(".active");
        SwitcherGroup.getWidth(t, o)
    })
}, SwitcherGroup.prototype.toggle = function (e) {
    var t = e.target, o = t.closest(".switcher-button"), r = o.querySelector(".switcher-button__float");
    t.parentNode.classList.contains("active") || t.classList.contains("switcher-button__items") || (o.querySelectorAll(".switcher-button__item").forEach(function (e) {
        return e.classList.remove("active")
    }), t.parentNode.classList.add("active"), r.style.width = "".concat(t.offsetWidth, "px"), r.style.transform = "translateX(".concat(t.parentNode.offsetLeft, "px)"))
}, Pagination.prototype.toggleItem = function (e) {
    var t = e.currentTarget, o = t.closest(".pagination").querySelector(".active");
    e.preventDefault(), t.parentNode.classList.contains("active") || (o.classList.remove("active"), t.parentNode.classList.add("active"))
}, ScrollTo.scrollDetect = function (e) {
    var t = window.scrollY;
    e.classList.contains("btn-scroll-page--down") ? window.innerHeight + t >= document.body.scrollHeight - 30 ? e.classList.add("is-hidden") : e.classList.remove("is-hidden") : 0 < t ? e.classList.remove("is-hidden") : e.classList.add("is-hidden")
}, ScrollTo.prototype.scrollTo = function () {
    var e = document.documentElement.scrollTop || document.body.scrollTop;
    this.button.classList.contains("btn-scroll-page--down") ? window.scrollTo(0, document.body.scrollHeight) : 0 < e && (window.requestAnimationFrame(this.scrollTo.bind(this)), window.scrollTo(0, e - e / 10))
}, InputSelects.prototype.scrollbar = function (e) {
    var t = e.currentTarget.parentNode.querySelector(".select2-results__options");
    t.classList.add("scrollbar-thin", "scrollbar-visible"), t.setAttribute("data-simplebar", !0)
}, InputSelects.prototype.init = function () {
    var o = this;
    this.inputs.forEach(function (e) {
        var t = e;
        $(t).select2({
            minimumResultsForSearch: -1,
            placeholder: $(t.getAttribute("data-placeholder")),
            dropdownParent: $(t.parentNode)
        }).on("select2:open", function (e) {
            return o.scrollbar(e)
        })
    })
}, InputTags.prototype = Object.create(InputSelects.prototype), (InputTags.prototype.constructor = InputTags).prototype.init = function () {
    var o = this;
    this.inputs.forEach(function (e) {
        var t = e;
        $(t).select2({
            width: "100%",
            tags: !0,
            tokenSeparators: [","],
            minimumResultsForSearch: -1,
            templateSelection: function (e) {
                return $("<span>".concat(e.text, '<span class="select2-selection__choice__remove"><svg class="icon-icon-cross"><use xlink:href="#icon-cross"></use></svg></span></span>'))
            },
            placeholder: $(t.getAttribute("data-placeholder")),
            dropdownParent: $(t.parentNode)
        }).on("select2:open", function (e) {
            return o.scrollbar(e)
        })
    })
}, DropdownSelect.prototype.selected = function (e) {
    var t = e.currentTarget, o = t.getAttribute("data-value");
    e.preventDefault(), this.dropdown.querySelector(".active").classList.remove("active"), t.classList.add("active"), this.input.value = o
}, Tag.remove = function (e) {
    var t = e.currentTarget.parentNode;
    t.classList.add("is-animating"), setTimeout(function () {
        t.parentNode.remove()
    }, 300)
};
var isTouchDevices = "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch,
    body = document.querySelector("body"), delay = function (t) {
        return new Promise(function (e) {
            return setTimeout(e, t)
        })
    }, triggerEvent = function (e, t) {
        var o, r = !(2 < arguments.length && void 0 !== arguments[2]) || arguments[2];
        "click" === e && (o = new MouseEvent("click", {bubbles: r, cancelable: !0, view: window}));
        t.dispatchEvent(o)
    }, themeStyle = function (e, t) {
        var o = !(2 < arguments.length && void 0 !== arguments[2]) || arguments[2],
            r = document.querySelector("html").getAttribute("data-theme"), n = function (e) {
                return getComputedStyle(document.documentElement).getPropertyValue(e)
            };
        if (void 0 !== t && "" !== t) {
            if ("light" === r) return o ? n(e) : e;
            if ("dark" === r) return o ? n(t) : t
        }
        return void 0 !== t && "" !== t || o ? n(e) : e
    }, imgLoaded = imagesLoaded(document.querySelector("body")), timeline = new Timeline;
$((isTouchDevices && document.querySelector("html").classList.add("is-touch"), imgLoaded.on("always", function () {
    setTimeout(function () {
        body.classList.add("load"), chart(), timeline.init()
    }, 300)
}), window.addEventListener("resize", function () {
    Echart.resize(), timeline.resize()
}), document.querySelectorAll("[data-simplebar]").forEach(function (e) {
    new SimpleBar(e).recalculate()
}), document.querySelectorAll(".js-dropdown-select").forEach(function (e) {
    new DropdownSelect(e)
}), document.querySelectorAll(".items-more__button").forEach(function (e) {
    var t = e;
    t && t.addEventListener("click", function () {
        return t.focus()
    })
}), new HeaderSearch, new ModuleSearch, new Sidebar, new SidebarPanel, new SwitcherGroup, new CheckboxToggle, new Tag, tooltip(), form(), formEditor(), map(), new Checkboxes, new ImageUpload, new ProfileUpload, new DatePicker, new CalendarInline("#calendarOne"), new CalendarFull, new Inbox, new Chat, new Todo, new Pagination, new InputSelects(".js-input-select"), new InputTags(".js-input-tags"), new Modal, new AddProduct, new OrderTabs, new ScrollTo, void scrolls())), $(function () {
    var e = document.querySelectorAll(".theme-toggle");
    if (e[0]) {
        localStorage.getItem("arion-theme") && document.querySelector("html").setAttribute("data-theme", localStorage.getItem("arion-theme"));
        e.forEach(function (e) {
            e.addEventListener("click", function (e) {
                return t = e.currentTarget, localStorage.setItem("arion-theme", t.getAttribute("data-theme")), void window.location.reload();
                var t
            })
        })
    }
});
