//---------------------------js here-------------------------------------------


$(document).ready(function () {

    $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function (data) {
        var gd = data.data.global_deaths;
        var ld = data.data.local_deaths;
        //console.log(data);
        //----------------------------------global deaths------------------------------
        $('#global').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: gd
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        //----------------------------------local------------------------------
        $('.local').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ld
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });



 
        var gd = data.data.global_deaths;
        var ld = data.data.local_deaths;
        //console.log(data);

        //----------------------------------local deaths------------------------------
        $('#locview').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ld
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });
        //----------------active cases------------------------------------

        // $('#alldetailsbtn').click(function () {
        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function(data) {

        var ac = data.data.local_active_cases;
        //console.log(data);

        //----------------------------------------------------------------
        $('#activecasesview').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ac
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });
        //----------------Local recoverd------------------------------------

        // $('#alldetailsbtn').click(function () {
        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function(data) {

        var ac = data.data.local_recovered;
        //console.log(data);

        //----------------------------------------------------------------
        $('#recoverdview').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ac
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });
        //----------------Local Total Number of Individuals in Hospitals-----------------------------------

        // $('#alldetailsbtn').click(function () {
        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function(data) {

        var ac = data.data.local_recovered;
        //console.log(data);

        //----------------------------------------------------------------
        $('#totnohos').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ac
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });
        //----------------Local Total Number of Individuals in Hospitals-----------------------------------

        // $('#alldetailsbtn').click(function () {
        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function(data) {

        var ac = data.data.local_total_number_of_individuals_in_hospitals;
        //console.log(data);

        //----------------------------------------------------------------
        $('#totnohos').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ac
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });
        //----------------Local Total Number of Individuals in Hospitals-----------------------------------

        // $('#alldetailsbtn').click(function () {
        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function(data) {

        var ac = data.data.total_pcr_testing_count;
        //console.log(data);

        //----------------------------------------------------------------
        $('#totpcr').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ac
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });

        //----------------Global Total Cases----------------------------------

        // $('#localdbtn').click(function () {
        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function(data) {

        var ac = data.data.global_total_cases;
        //console.log(data);

        //----------------------------------------------------------------
        $('#globaltc').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text(),
                end: ac
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    console.log();
                }
            });
        });
        // });
        // });

        // });

        //---------------date----------------------------------


        // $.getJSON('https://www.hpb.health.gov.lk/api/get-current-statistical', function (data) {

        var ac = data.data.update_date_time;

        date_s = ac.substring(0, 10) + " at " + ac.substring(10)
        //----------------------------------------------------------------
        $("#udate").append(date_s);
    });


});