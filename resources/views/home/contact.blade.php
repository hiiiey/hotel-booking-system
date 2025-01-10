<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>


                @if(session()->has('message'))


                <div class="alert alert-success">

                    <button type="button" class="close" data-bs-dismiss='alert'>X</button>

                    {{session()->get('message')}}


                </div>



                @endif


            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="request" class="main_form" action="{{url('contact')}}" method="Post">


                    @csrf


                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name" type="type" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="email address" type="email" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" type="type" name="message" required>Message</textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="send_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62998.768963916256!2d123.24078172801988!3d9.295729778849843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab6edb788ea0f7%3A0xd79dfe9b5bfc37fb!2sDumaguete%2C%20Negros%20Oriental!5e0!3m2!1sen!2sph!4v1736315702999!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>