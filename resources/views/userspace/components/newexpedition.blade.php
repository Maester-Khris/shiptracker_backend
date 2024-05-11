

<div class="row">
    <div class="col-md-5 add-colis-form" style="">
        <form action="">
            <div style=" margin-bottom:20px;">
            <h4>Ajouter des Colis</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="text" id="new-colis-desc" class="form-control active"
                            placeholder="Mr Duchampds" />
                        <label class="form-label" for="form12">Description</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="number" id="new-colis-height" class="form-control active"
                            placeholder="15cm" />
                        <label class="form-label" for="form12">Longueur</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="number" id="new-colis-width" class="form-control active"
                            placeholder="10cm" />
                        <label class="form-label" for="form12">Largeur</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="number" id="new-colis-length" class="form-control active"
                            placeholder="30cm" />
                        <label class="form-label" for="form12">Hauteur</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="number" id="new-colis-weight" class="form-control active"
                            placeholder="25Kg" />
                        <label class="form-label" for="form12">Poids</label>
                    </div>
                </div>
                <div style="display:flex;flex-direction:row;justify-content:flex-end;">
                    <button data-mdb-ripple-init id="new-colis" class="btn btn-primary btn-block" style="margin:0px;margin-right:10px;">Ajouter</button>
                    <button data-mdb-ripple-init id="new-colis-complete" class="btn btn-success btn-block" style="margin:0px;">Terminer</button>
                </div>
            </div>
            
            
        </form>
    </div>

    <div class="col-md-7 recap-colis d-none" style="">
        <div style=" margin-bottom:20px;">
            <h4>Recapitulatif</h4>
        </div>
        <form action="">
            <div class="row mb-4">
            <div class="col-md-12">
                <div class="form-outline" data-mdb-input-init>
                <input type="text" id="form12" class="form-control active"
                    value="{{Auth::user()->name}}" readonly/>
                <label class="form-label" for="form12">Expéditeur</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-outline" data-mdb-input-init>
                    <input type="text" id="ship_receiver_name" class="form-control active"
                        placeholder="Mr Duchampds" />
                    <label class="form-label" for="form12">Nom Destinataire</label>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-outline" data-mdb-input-init>
                    <input type="tel" id="ship_receiver_tel" class="form-control active"
                        placeholder="Mr Duchampds" />
                    <label class="form-label" for="form12">Telephone Destinataire</label>
                </div>
            </div> --}}
            </div>
        </form>
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th scope="col">Colis</th>
                <th scope="col">Volumetrie</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody class="table-group-divider table-divider-color recap-lines">
            {{-- <tr>
                <td>Paquet 1</td>
                <td>23 x 24 x 32</td>
                <td>Fcfa 2450</td>
            </tr>
            <tr>
                <td>Paquet 2</td>
                <td>23 x 24 x 32</td>
                <td>Fcfa 4450</td>
            </tr> --}}
            {{-- <tr class="recap-lines-total">
                <td colspan="2">Total:</td>
                <td>Fcfa 25000</td>
            </tr> --}}
            </tbody>
        </table>
        <button id="order-ship" data-mdb-ripple-init class="btn btn-success btn-block" style="">Valider la reservation</button>
    </div>
</div>