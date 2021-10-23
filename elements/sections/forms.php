
<style>

    .h-100,
    .h-75 {
        min-height: 50% !important;
        max-height: 50% !important;
    }

</style>

<form class="pi-draggable">
    <div class="form-group"> <label>Email address</label> <input type="email" class="form-control" placeholder="Enter email"> <small class="form-text text-muted">We'll never share your email with anyone else.</small> </div>
    <div class="form-group"> <label>Password</label> <input type="password" class="form-control" placeholder="Password"> </div> <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<form id="c_form-h" class="pi-draggable">
    <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">E-mail</label>
        <div class="col-10">
            <input type="email" class="form-control" id="inputmailh" placeholder="mail@example.com"> </div>
    </div>
    <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">Password</label>
        <div class="col-10">
            <input type="password" class="form-control" id="inputpasswordh" placeholder="Password"> </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<form class="form-inline pi-draggable">
    <div class="form-group">
        <input type="email" class="form-control" id="inputmailinline" placeholder="E-mail"> </div>
    <div class="form-group">
        <input type="password" class="form-control mx-2" id="inputpasswordinline" placeholder="Password"> </div>
    <button type="submit" class="btn btn-primary ">Log in</button>
</form>
<br>
<form class="form-inline pi-draggable">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Your e-mail">
        <div class="input-group-append"><button class="btn btn-primary" type="button">Subscribe</button></div>
    </div>
</form>
<br>
<form class="form-inline pi-draggable">
    <div class="input-group">
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
        <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>
    </div>
</form>
<form class="pi-draggable" id="c_form-complex" style="max-width:200%; min-width:160%; transform-origin: left; transform: scale(0.575);">
    <div class="form-row">
        <div class="form-group col-md-6"> <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> </div>
        <div class="form-group col-md-6"> <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password"> </div>
    </div>
    <div class="form-group"> <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> </div>
    <div class="form-group"> <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> </div>
    <div class="form-row">
        <div class="form-group col-md-6"> <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity"> </div>
        <div class="form-group col-md-4"> <label for="inputState">State</label> <select id="inputState" class="form-control">
                <option selected="" value="Choose...">Choose...</option>
                <option value="...">...</option>
            </select> </div>
        <div class="form-group col-md-2"> <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip"> </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" value="on"> <label class="form-check-label" for="gridCheck"> Check me out </label> </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<form class="form-inline pi-draggable">
    <div class="input-group"> <input type="email" class="form-control" placeholder="Your email">
        <div class="input-group-append"> <button class="btn btn-primary" type="button">Subscribe</button> </div>
    </div>
</form>
