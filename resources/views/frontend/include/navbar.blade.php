<div class="header__navbar">
    <div class="logo">
        <a href="index.html"><img src="{{asset('frontend/images/logo.png')}}" width="125px" /></a>
    </div>
    <nav>
        <ul id="MenuItems">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="{{url('/products')}}">Products</a>
            </li>
            <li>
                <a href="">About</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>
            <li>
                <a href="{{url('/account')}}">Account</a>
            </li>
        </ul>
    </nav>
    <a href="{{url('/order')}}"><img src="{{asset('frontend/images/cart.png')}}" alt="cart logo" width="30px" height="30px" /></a>(<span id="CartSum"></span>)
    <img class="menu-icon" src="{{asset('frontend/images/menu.png')}}" alt="menu logo" onclick="menutoggle()" />
</div>

@section('javascript')

<script>
    $(document).ready(function() {
        //To get all the value from the DB 
        //To display in the table
        getSum();
    });

    //get single id Data to edit 
    function getSum() {
        axios.get('/getCartSum')
            .then(function(response) {
                // handle success
                var data = response.data;
                document.getElementById('CartSum').innerHTML = data;
            })
            .catch(function(error) {
                // handle error
            });
    }

    var arr = document.getElementsByClassName('SubPrice');
    valSum = 0;

    for (i = 0; i < arr.length; i++) {
        valSum += parseInt(arr[i].innerText);
    }

    document.getElementById('subTotal').innerText = valSum;

    let tax = parseInt(document.getElementById('tax').innerText);

    let Total = valSum + tax;

    document.getElementById('total').innerText = Total;

    //get single id Data to edit 
    // function updateQty() {
    //     var va = document.getElementById('QTY').value;
    //     console.log(va);

    //     const a = document.querySelector("input");

    //     console.log(a.dataset.value);
    //     axios.get('/updateQty')
    //         .then(function(response) {
    //             // handle success
    //             // var data = response.data;
    //             // document.getElementById('CartSum').innerHTML = data;
    //         })
    //         .catch(function(error) {
    //             // handle error
    //         });
    // }

    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }

    //For Product gallery
    var ProductImg = document.getElementById('ProductImg');
    var SmallImg = document.getElementsByClassName('small-img');

    SmallImg[0].onclick = function() {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick = function() {
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onclick = function() {
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onclick = function() {
        ProductImg.src = SmallImg[3].src;
    }
</script>
@endsection