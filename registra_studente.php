<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/msform.css">
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="header">
                    <div class="header-main">
                        <h1>Registrazione Studente</h1>
                        <div class="header-bottom">
                            <div class="header-right w3agile">
                                <div class="header-left-bottom agileinfo">
                                    <form action="php_scripts/inserisci_studente.php" method="POST">
                                        <table class="formtable">
                                            <col width="10%"><col width="10%"><col width="10%"><col width="10%"><col width="10%">
                                            <col width="10%"><col width="10%"><col width="10%"><col width="10%"><col width="10%">
                                            <tr>
                                                <td colspan="5"><input type="email"  placeholder="Email*" name="email" id="email" required/></td>
                                                <td colspan="5"><input type="email"  placeholder="Conferma Email" id="conferma_email" required/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" width="50%"><input type="password"  placeholder="Password [Min 8 caratteri]*" name="password" id="password" required minlength="8"/></td>
                                                <td colspan="5" width="50%"><input type="password"  placeholder="Conferma Password" id="conferma_password" required/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><input type="text"  placeholder="Nome*" name="nome" required/></td>
                                                <td colspan="5"><input type="text"  placeholder="Cognome*" name="cognome" required/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"><input type="text"  placeholder="Indirizzo*" name="indirizzo" required/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <p>Data di Nascita*</p>
                                                    <select name="data_nascita_gg" id="data_nascita_gg" name="data_nascita_gg">
                                                        <option disabled selected hidden value="GG">GG</option>
                                                        <?php
                                                            for($i = 1; $i <= 31; $i++){
                                                                $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <select name="data_nascita_mm" id="data_nascita_mm">
                                                        <option disabled selected hidden>MM</option>
                                                        <?php
                                                        for($i = 1; $i <= 12; $i++){
                                                            $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select name="data_nascita_aa" id="data_nascita_aa" name="data_nascita_aa">
                                                        <option disabled selected hidden>AA</option>
                                                        <?php
                                                            for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td  colspan="5">
                                                    <p>Sesso*</p>
                                                    <select name="sesso" style="min-width: 125px">
                                                        <option value="M">Maschile</option>
                                                        <option value="F">Femminile</option>
                                                    </select>
                                                </td>
                                            <tr>
                                                <td class="input_container" colspan="4">
                                                    <div class="ui-widget">
                                                        <input type="text" id="regione_auto" placeholder="Regione di Residenza*" required>
                                                    </div>
                                                </td>
                                                <td class="input_container" colspan="2">
                                                    <div class="ui-widget">
                                                        <input type="text" id="provincia_auto" placeholder="Prov.*" required>
                                                    </div>
                                                </td>
                                                <td class="input_container" colspan="4">
                                                    <div class="ui-widget">
                                                        <input type="text" id="comune_auto" placeholder="Comune*" name="comune" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td colspan="10"><input type="number"  placeholder="Cellulare" name="cellulare" minlength="10" maxlength="10"/></td></tr>
                                            <tr>
                                                <td colspan="9"><input type="text" placeholder="Indirizzo Scolastico*" name="indirizzo_scolastico"></td>
                                                <td colspan="1"><input type="number" placeholder="Anno*" name="anno_frequentazione"></td>
                                            </tr>
                                        </table>

                                        <input type="checkbox" name="disp[]" required>
                                        <label><h6>Richiesta di consenso al trattamento dei dati personali(ai sensi dell'articolo 13 del <a href="http://www.camera.it/parlam/leggi/deleghe/03196dl.htm">decreto legislativo numero 196/2003</a> in materia dei dati personali)</h6></label><br><br><br>

                                        <input id="submit_btn" type="submit" value="Registrati">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php include 'footer.php'; ?>
<script src="js/validator.js"></script>
<script src="vendor/jquery-cascading/jquery.cascading-autocompletes.js"></script>
<script src="js/cascading_autocomplete.js"></script>
