
<div class="chat card col-sm-4 shadow-lg">
    <div id="all-threads">
        <div class="card-header text-center pt-3 pb-0">
            <div class="default">
                <a  href="#" class="chat-close fa fa-times float-left text-danger text-decoration-none fa-lg"></a>
                <span class="font-weight-bold">Message</span>
                <a href="#" class="chat-search fa fa-search float-right text-success text-decoration-none"></a>
            </div>
            <!-- Chat Search -->
            <form class="d-none d-sm-inline-block form-inline navbar-search" action="#">
                <div class="input-group search">
                    <div class="input-group-prepend">
                        <a  href="#" class="chat-search-close float-left text-danger text-decoration-none btn btn-outline-danger"><i class="fa fa-times fa-lg"></i></a>
                    </div>
                    <input type="text" id="search-bar" class="form-control bg-light border-0 small" placeholder="Search for Member..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">
                            <i class="fa fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body px-0">
        </div>
        {{--<div class="card-footer"></div>--}}
    </div>
    <div id="single-thread">
        <div class="card-header text-center">
            <a href="#" class="chat-back text-danger fa fa-arrow-left float-left text-decoration-none"></a>
            <span id="single-thread-name"></span>
        </div>
        <div class="card-body px-0">
        </div>
        <div class="card-footer">
            <form action="#" method="post" id="msg_submit">
                <div class="input-group mb-3">
                    <textarea class="form-control" placeholder="send message..." id="msg"></textarea>
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>