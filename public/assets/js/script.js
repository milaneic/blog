$(document).ready(function(){

    $(document).on('click','.cat',function(){
        let id=$(this).data('id');

        $.ajax({
            url: "posts/filter",
            method: "get",
            data: {
                id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                getPostCategory(data);
            }
        });

    })

    $(document).on('keyup','#searcha',function (){
        let key=$(this).val();
        //alert(key);
        $.ajax({
            url: "posts/filters",
            method: "get",
            data:{
                key
            },
            dataType: "json",
            success:function (data){
                console.log(data);
                getPostCategory(data);
            }
        })
    });

    $(document).on('change',"#ddlo",function(){
        var d = document.getElementById("ddlo");
        var a = d.options[d.selectedIndex].value;

        $.ajax({
            url: "posts/filterd",
            method: "get",
            data:{
                a
            },
            dataType:"json",
            success:function (data){
                getPostCategory(data);
            }
        })
    })

})
function getPostCategory(data){
    let html="";
    for(let post of data){
        html+=`
        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="assets/img/blog/${post.img}" alt="${post.img }">
                                <a href="#" class="blog_item_date">
                                    <h3>${post.created_at}</h3>
                                    <p></p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="">
                                    <h2>${post.caption}</h2>
                                </a>
                                <p>${post.description}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
        `;
    }
    $('#plc').html(html);
}

/*function getPostsCategories(data){
    let html="";
    for(let post of data){
        html+=`
        <div class="col-lg-4">
              <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                              <img src="${post.img}" alt="${post.img}">
                    </div>
               <div class="trend-bottom-cap">
                      <h4 class="color1"><a href="route('posts.show', ${post})">${post.caption}</a></h4>
                      <paragraph>${post.description}</paragraph>
               </div>
            </div>
        </div>
        `;
    }
    $('#plc').html(html);
}*/

