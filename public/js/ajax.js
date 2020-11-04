var page = 0;
loadmore();
async function loadmore(){  
    
    const orderBy = document.getElementById("sort").value;
    if(orderBy == "None"){
        page = page + 1; 
    }
    if (page == 1) {
        const first_page = document.getElementById("first-page");
        first_page.setAttribute("href","#");
        first_page.setAttribute("disabled","true");
        first_page.classList.add("btn-dark");
    }else{
        const first_page = document.getElementById("first-page");
        first_page.setAttribute("href","listUser.php");
        first_page.setAttribute("disabled","false");
        first_page.classList.remove("btn-dark");
    }
    const data_user = document.getElementById('data-user');
    const btn_loadmore = document.getElementById('btn_loadmore');
    const url = "loadmore.php";
    const data = {page:page,orderBy:orderBy};
    const responce = await fetch(url,{
        method: 'POST',
        body: JSON.stringify(data)
    })
    const result = await responce.json();
    if (result.length > 5) {
        result.length = 5;
    }else{
        btn_loadmore.setAttribute("disabled","true");
        btn_loadmore.classList.add("btn-dark");
        btn_loadmore.innerText = "Hết Dữ Liệu";
    }
    data_user.innerText = ``;
    result.forEach(user => {
        const new_tr = document.createElement("tr");
        new_tr.innerHTML = `
        <td>${user.id}</td>   
        <td><img src="./public/images/${user.image_profile}" alt=""></td>   
        <td>${user.username}</td>   
        <td>${user.fullname}</td>
        <td>${user.email}</td> 
        <td>${user.user_type}</td>
        <td>
            <a title="Xem Chi Tiết" class="btn btn-success" href="view.php?view=${user.id}"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
        
            <a title="Sửa user" class="btn btn-warning" href="edit.php?edit=${user.id}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
            
            <a title="Xóa user" class="btn btn-danger" href="delete.php?delete=${user.id}"><i class="fa fa-times" aria-hidden="true"></i> Xóa</a>
        </td>
        `;
        data_user.appendChild(new_tr);
    });
};

async function search_User(){   
    const datas = document.getElementById('data-user');
    const search = document.getElementById('search');
    let search_key = search.value;
    if (search_key.length > 0) {
        const url = "search.php";
        const data = {search_key:search_key};
        const responce = await fetch(url,{
        method: 'POST',
        body: JSON.stringify(data)
        })
        const result = await responce.json();
        datas.innerHTML = "";
        result.forEach(user => {
        const new_tr = document.createElement("tr");
        new_tr.innerHTML = `
        <td>${user.id}</td>
        <td><img src="./public/images/${user.image_profile}" alt=""></td>   
        <td>${user.username}</td>   
        <td>${user.fullname}</td>   
        <td>${user.email}</td> 
        <td>${user.user_type}</td>
        <td>
            <a title="Xem Chi Tiết" class="btn btn-success" href="listUser.php?view=${user.id}"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
            
            <a title="Sửa user" class="btn btn-warning" href="edit.php?edit=${user.id}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
            
            <a title="Xóa user" class="btn btn-danger" href="delete.php?delete=${user.id}"><i class="fa fa-times" aria-hidden="true"></i> Xóa</a>
        </td>
        `;
        datas.appendChild(new_tr);
        });
    }else{
        loadmore();
    }
    
};