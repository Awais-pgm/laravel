@extends('home.app')
@push('title')
    <title>payment</title>
@endpush
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  outline: none; border:none;
  text-transform: capitalize;
  transition: all .2s linear;
}

.main{
  display: flex;
  justify-content: center;
  align-items: center;
  padding:25px;
  min-height: 100vh;
  
}

.main form{
  padding:20px;
  width:700px;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
}

.main form .row{
  display: flex;
  flex-wrap: wrap;
  gap:15px;
}

.main form .row .col{
  flex:1 1 250px;
}

.main form .row .col .title{
  font-size: 20px;
  color:#333;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.main form .row .col .inputBox{
  margin:15px 0;
}

.main form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.main form .row .col .inputBox input{
  width: 100%;
  border:1px solid #ccc;
  padding:10px 15px;
  font-size: 15px;
  text-transform: none;
}

.main form .row .col .inputBox input:focus{
  border:1px solid #000;
}

.main form .row .col .flex{
  display: flex;
  gap:15px;
}

.main form .row .col .flex .inputBox{
  margin-top: 5px;
}

.main form .row .col .inputBox img{
  height: 34px;
  margin-top: 5px;
  filter: drop-shadow(0 0 1px #000);
}

.main form .submit-btn{
  width: 100%;
  padding:12px;
  font-size: 17px;
  background: #dc3545;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
<body>

    <div class="container main">
        <form action="">
            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>
                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" placeholder="john deo">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="Islamabad">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="pakistan">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" placeholder="12356">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">payment</h3>
                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="/assets/images/mastercard.svg" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" placeholder="mr. john deo">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="1234">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="proceed to checkout" class="submit-btn">
        </form>
    </div>
</body>
@endsection