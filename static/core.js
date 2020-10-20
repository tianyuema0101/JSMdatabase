'use strict';
var url_link ="";
var current_category = "";
var cuttrnt_c_title = "all categories";
var category_list = new Array();
$(document).ready(function(){
        $.get("api/category/?level=2",function(data,status) {
            console.log(data)
            for (let item in data) {
                let cname = data[item].name;
                let cid = data[item].id;
                let level = data[item].level;
                category_list[cname] = cid;
                let end_node = document.getElementById('navigation_end');

                 var li = document.createElement("li");
                    li.setAttribute('class', "nav-item");
                    var a_tage = document.createElement("a");
                    a_tage.setAttribute('class', "nav-link");
                    a_tage.innerHTML = "<i class=\"fas fa-fw fa-folder\"></i><span>" + cname + "</span>";
                    li.appendChild(a_tage);
                    document.getElementById('accordionSidebar').insertBefore(li, end_node);

            }
        });

        $.get("api/category/?level=1",function(data,status) {
            console.log(data)
            let currentTopic = "";
             let hr = document.createElement("hr");
             hr.setAttribute('class', 'sidebar-divider');
             let new_div = document.createElement('div');
             new_div.setAttribute('class', 'sidebar-heading');
             new_div.innerText = 'Administrative';
              let end_node = document.getElementById('navigation_end');
             document.getElementById('accordionSidebar').insertBefore(hr, end_node);
             document.getElementById('accordionSidebar').insertBefore(new_div, end_node);

             let storeDiv2;
             for (let item in data) {
                let cname = data[item].name;
                let cid = data[item].id;
                let level = data[item].level;
                category_list[cname + " in " + data[item].store] = cid;


                if (currentTopic != cname) {
                        var li = document.createElement("li");
                        li.setAttribute('class', "nav-item");
                        var a_tage = document.createElement("a");
                        a_tage.setAttribute('class', "nav-link collapsed");
                        a_tage.setAttribute('href', "#");
                        a_tage.setAttribute('data-toggle', "collapse");
                        a_tage.setAttribute('data-target', ("#collapse" + item));
                        a_tage.setAttribute('aria-expanded', "true");
                        a_tage.setAttribute('aria-controls', ("collapse" + item));
                        a_tage.innerHTML = "<i class=\"fas fa-fw fa-folder\"></i><span>" + cname + "</span>";
                        li.appendChild(a_tage);
                        var storeDiv = document.createElement("div");
                        storeDiv.setAttribute("id", ("collapse" + item));
                        storeDiv.setAttribute("class", "collapse");
                        storeDiv.setAttribute("aria-labelledy", ("heading" + item));
                        storeDiv.setAttribute("data-parent", "#accordionSidebar");
                        storeDiv2 = document.createElement("div");
                        storeDiv2.setAttribute("class", "bg-white py-2 collapse-inner rounded");
                        var storeA = document.createElement('a');
                        storeA.setAttribute("class", "collapse-item");
                        storeA.innerText = data[item].store;
                        storeA.setAttribute('id', (cname + " in "+ data[item].store));
                        storeDiv2.appendChild(storeA);
                        storeDiv.appendChild(storeDiv2);
                        li.appendChild(storeDiv)
                        document.getElementById('accordionSidebar').insertBefore(li, end_node);
                        currentTopic = cname;
                    } else {
                        var storeA = document.createElement('a');
                        storeA.setAttribute("class", "collapse-item");
                        storeA.innerText = data[item].store;
                        storeA.setAttribute('id', (cname + " in "+ data[item].store));
                        storeDiv2.appendChild(storeA);
                    }
                    // var li = document.createElement("li");
                    // li.setAttribute('class', "nav-item");
                    // var a_tage = document.createElement("a");
                    // a_tage.setAttribute('class', "nav-link");
                    // a_tage.innerHTML = "<i class=\"fas fa-fw fa-folder\"></i><span>" + cname + "</span>";
                    // li.appendChild(a_tage);
                    // document.getElementById('accordionSidebar').insertBefore(li, end_node);

                }
                 // var li = document.createElement("li");
                 //    li.setAttribute('class', "nav-item");
                 //    var a_tage = document.createElement("a");
                 //    a_tage.setAttribute('class', "nav-link");
                 //    a_tage.innerHTML = "<i class=\"fas fa-fw fa-folder\"></i><span>" + cname + "</span>";
                 //    li.appendChild(a_tage);
                 //    document.getElementById('accordionSidebar').insertBefore(li, end_node);

                // let end_hr = document.createElement("hr");
                // end_hr.setAttribute('class', 'sidebar-divider d-none d-md-block');
                // let end_div = document.createElement("div");
                // end_div.setAttribute('class', 'text-center d-none d-md-inline');
                // end_div.innerHTML = "<button class=\"rounded-circle border-0\" id=\"sidebarToggle\"></button>";
                // document.getElementById('accordionSidebar').appendChild(end_hr);
                // document.getElementById('accordionSidebar').appendChild(end_div);

            })

});

function create_document(category,topics_josn, canme) {
        $("#card_left").empty();
        $("#card_right").empty();
        console.log(canme);
        document.getElementById("category_header").innerText = canme;


        let topics = topics_josn.results;
        for(let id in topics) {
            let total_div = document.createElement('div');
            total_div.setAttribute('class', "card shadow mb-4");
            let card_a_tag = document.createElement('a');
            card_a_tag.setAttribute('href', "#NO" + id);
            card_a_tag.setAttribute('class', "d-block card-header py-3");
            card_a_tag.setAttribute('data-toggle', 'collapse');
            card_a_tag.setAttribute('role', 'button');
            card_a_tag.setAttribute('aria-expanded', 'false');
            card_a_tag.setAttribute('aria-controls', 'collapseCardExample');
            let card_head = document.createElement('h6');
            card_head.setAttribute('class', "m-0 font-weight-bold text-primary");
            let topic = topics[id];
            let title = topic.title;
            if (title != "") {
                card_head.innerHTML = title;
                let time = topic.add_time.substr(0,10);
                let name = topic.user;
                let time_span = document.createElement("span");
                time_span.setAttribute("style", "float: right");
                time_span.innerHTML = name + " [" + time + "]";
                console.log(time_span)
                card_a_tag.appendChild(card_head);
                card_head.appendChild(time_span);
                total_div.appendChild(card_a_tag);
            }

            let t_div = document.createElement("div");
            setAttributes(t_div, {'class': "collapse", 'id': ("NO" + id)})

            let desc = topic.description;
            if (desc.length > 0) {
                let content_div = document.createElement('div');
                content_div.setAttribute('class', 'card-body');
                content_div.innerText = desc;
                t_div.appendChild(content_div);
            }


            let documents = new Array();
            if (topic.document_file != null) {
                documents.push(topic.document_file)
            }
            ;
            if (topic.document_file2 != null) {
                documents.push(topic.document_file2)
            }
            ;
            if (topic.document_file3 != null) {
                documents.push(topic.document_file3)
            }
            ;
            if (topic.document_file4 != null) {
                documents.push(topic.document_file4)
            }
            ;
            if (topic.document_file5 != null) {
                documents.push(topic.document_file5)
            }
            ;

            if (documents.length > 0) {
                let ul_document = document.createElement('ul');
                for (let i in documents) {
                    let li_document = document.createElement('li');
                    let file_link = documents[i];
                    let a_link = document.createElement('a');
                    a_link.setAttribute('href', file_link);
                    a_link.setAttribute('target', "_Blank");
                    a_link.setAttribute('style', "word-break: break-word")
                    a_link.innerHTML = file_link.substr(40,);
                    li_document.appendChild(a_link);
                    ul_document.appendChild(li_document);
                }
                t_div.appendChild(ul_document);
            }

            total_div.appendChild(t_div);
            if (id < 5){
                document.getElementById("card_left").appendChild(total_div);
            }else
            {
                 document.getElementById("card_right").appendChild(total_div);
            }
        }
}

function create_page(topics_josn, page_now){
        $("#page_num li").remove();
        let count = topics_josn.count;
        let page_ul = document.getElementById("page_num");
        if(page_now !=1) {
            page_ul.innerHTML = "<li class=\"page-item\"><a class=\"page-link\">Previous</a></li>";
        }else{
            page_ul.innerHTML = "<li class=\"page-item disabled\"><a class=\"page-link\">Previous</a></li>";
        }
        for(let i=1; i<=Math.ceil(count/10); i++){
            let p_li = document.createElement("li");
            p_li.setAttribute('class', 'page-item');
            let a_li = document.createElement('a');
            a_li.setAttribute("class", "page-link");
            a_li.innerHTML = i;
            p_li.appendChild(a_li);
            page_ul.appendChild(p_li);
        }
        let next_li = document.createElement("li");
        next_li.setAttribute('class', 'page-item');
        // console.log(typeof page_now)
        // console.log(page_now == parseInt(Math.ceil(count/10)))
        // if(page_now == Math.ceil(count/10) ){
        //     next_li.setAttribute('class', 'disabled');
        // }
        let next_a = document.createElement('a');
        next_a.setAttribute("class", "page-link");
        next_a.innerHTML = "Next";
        next_li.appendChild(next_a);
        page_ul.appendChild(next_li);
}


var current_page = 1;
$('ul#page_num').on('click','li',function () {
        console.log($(this).text());
        let page_id = $(this).text();
        let cname = document.getElementById("category_header").innerText + "";
        if(page_id == "Previous"){
            page_id = current_page - 1;
        }else if(page_id == "Next"){
            page_id = current_page + 1;
        }
        console.log(cname);
        //
        // let page_ulr = url_link + "&page=" + page_id;
        let id = category_list[cname];
        url_link = "api/document/?category_id=" + id;
        current_category ="&category_id=" +id;
        let page_ulr = url_link + "&page=" + page_id;
        //let header = document.getElementById("category_header").innerText;
        console.log(page_ulr);
        $.get(page_ulr, function (data, status) {
            console.log(data)
            //let caname = document.getElementById("category_header").innerText;
            console.log(cname);
            create_document(id, data,cname);
            create_page(data, page_id);
            document.getElementById('page_num').getElementsByTagName('li')[page_id].setAttribute("class", "active");
            current_page = parseInt(page_id);
        })
    }
    )

$('#search_area').keypress(function(e) {
      if(e.keyCode == 13) {
          let input_value = $('#search_area').val();
        url_link = "api/document/?search=" + input_value + current_category;
        $.get(url_link, function (data, status) {
            console.log(data)
            create_document("Search",data, "Search Result in " + cuttrnt_c_title);
            create_page(data, 1);
            current_page = 1;
    })
      }});

$('#search_button').click(function(e) {
    let input_value = $('#search_area').val();
    url_link = "api/document/?search=" + input_value + current_category;
    $.get(url_link, function (data, status) {
        console.log(data)
        create_document("Search",data, "Search Result in " + cuttrnt_c_title);
        create_page(data, 1);
        current_page = 1;
    })
      });

$('ul#accordionSidebar').on('click','a',function () {
        console.log($(this).attr("id"));
        let cname = $(this).attr("id");
        console.log(category_list);
        let id = category_list[cname];
        url_link = "api/document/?category_id=" + id;
        current_category ="&category_id=" +id;
        cuttrnt_c_title = cname;
        console.log(url_link);
        $.get(url_link, function (data, status) {
            console.log(data)
            create_document(id,data,cname);
            create_page(data, 1)
            current_page = 1;
        });
        console.log(url_link);
    });

$('ul#accordionSidebar').on('click','li',function () {
        console.log($(this).text());
        let cname = $(this).text();
        console.log(category_list);
        let id = category_list[cname];
        url_link = "api/document/?category_id=" + id;
        current_category ="&category_id=" +id;
        cuttrnt_c_title = cname;
        $.get(url_link, function (data, status) {
            console.log(data)
            create_document(id,data,cname);
            create_page(data, 1)
            current_page = 1;
        });
    });

function setAttributes(el, attrs){
    for(var key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
}