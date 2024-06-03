@extends('admin/layout')

@push("styles")
<style>
    form input, form textarea{
        font-size:14px!important;
    }
</style>
@endpush

@push("scripts")
<script>
    document.addEventListener("DOMContentLoaded",function(){
        let read_more_btns = document.querySelectorAll(".read-more");
        let reply_btns = document.querySelectorAll(".reply");
        read_more_btns.forEach(btn =>{
            btn.addEventListener("click",function(){
                let messageline = this.closest('tr');
                let recipientname = messageline.querySelector('td:first-child').innerText;
                let msgcontent = messageline.querySelector('td:nth-child(4) span').innerText;
                document.querySelector('#recipient-name').innerText = recipientname;
                document.querySelector('#message-content').innerText = msgcontent;
            })
        });
        reply_btns.forEach(btn =>{
            btn.addEventListener("click",function(){
                let messageline = this.closest('tr');
                let recipientname = messageline.querySelector('td:first-child').innerText;
                let messagetype = messageline.querySelector('td:nth-child(3) span').innerText;
                let typevalue = messagetype == "reclamation" ? 3 : 2;
                document.querySelector('#new-message-recipient-email').value=this.getAttribute('reply-to');
                document.querySelector('#new-message-recipient-name').value=recipientname;
                document.querySelector('#new-message-type').value=typevalue;
                document.querySelector('#new-message-content').value="";
            })
        });
    })
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12 ">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title" style="border-bottom-width: 0px;">
                    <h2>Liste des messages</h2>
                    <ul class="nav navbar-right panel_toolbox justify-content-end">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Expediteur</th>
                                <th>Sujet</th>
                                <th>Categorie</th>
                                <th>Contenu</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($msgs as $msg)
                                <tr>
                                    <td>{{$msg->guest_name}}</td>
                                    <td><strong>{{$msg->message_subject}}</strong></td>
                                    <td>
                                        <span class="{{$msg->message_type == "information" ? 'badge badge-primary' : 'badge badge-warning'}}" style="padding:5px 10px">{{$msg->message_type}}</span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block" style="line-height:18px;width:100px;height:50px;overflow:hidden;text-overflow: ellipsis;">
                                            {{$msg->message_content}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary read-more" style="padding:5px 10px;margin-bottom:5px;cursor:pointer;"><i class="fa fa-eye"
                                                style="margin-right: 5px;"></i>Voir message</span>
                                        <span reply-to="{{$msg->guest_email}}" class="badge bg-green reply" style="padding:5px 10px;cursor:pointer;"><i class="fa fa-mail-reply"
                                                style="margin-right: 5px;"></i>Repondre</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="message-container x_panel">
                <div class="x_title" style="border-bottom-width:0px;margin-bottom:0px;">
                    <h2>Message de: <span id="recipient-name"></span></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="message-content" style="padding: 8px; min-height:50px; background:#eee;border:1px solid #b4b4b4;border-radius:5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title" style="border-bottom-width: 0px;">
                <h2>Repondre au message</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{url('/messages/reply')}}" method="POST" class="form-horizontal form-label-left">
                    @csrf
                    <input id="new-message-type" type="hidden" name="message_type" value="">
                    <input id="new-message-recipient-name" type="hidden" name="recipient_name" value="">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Expediteur:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="sender_mail" class="form-control" readonly="readonly" value="noreply@olbizgo.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Destinataire:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="new-message-recipient-email" type="email" name="recipient_mail" class="form-control" readonly="readonly" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Message:</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea id="new-message-content" name="msg_response" class="form-control" rows="10" placeholder="Saisissez le contenu du message de ici"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group d-flex justify-content-between">
                        <button class="btn btn-warning" type="reset">Annuler</button>
                        <button class="btn btn-success" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection