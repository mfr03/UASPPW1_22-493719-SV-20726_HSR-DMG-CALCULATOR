<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>HSR Calcyklator</title>
</head>
<?php include 'connection.php' ?>
<body style="min-height: 100vh;" onload="callStack()">
    <div class="container mt-5">
        <div class="row">
            <div id="form-wrapper-selection-1" class="container col-sm-3 order-sm-1 order-2 mb-sm-0 mb-3">
                <div class="row h-100">
                    <div id="selection_1" class="col-sm-12 order-1 h-100">
                        <div class="col-sm-12 d-flex flex-column">
                            <div>
                                <a class="" onclick="changeSelection('character')">Characters</a>
                                <a class="d-sm-none d-inline" onclick="changeSelection('cone')">Light Cones</a>
                            </div>
                            <div id="selection-characters" class="d-sm-block">
                                <div id="selection-character" class="row mt-1">
                                    <div class="col-7">
                                        <p id="chara-name">Seele</p>
                                        <label class="col-form-label-sm" for="chara-level">Character Level</label>
                                        <input id="chara-level" type="text" class="form-control-sm" value="80" onchange="callStack()">
                                        <select class="form-select-sm">
                                            <option selected value="0">E0</option>
                                            <option value="1">E1</option>
                                            <option value="2">E2</option>
                                            <option value="3">E3</option>
                                            <option value="3">E4</option>
                                            <option value="3">E5</option>
                                            <option value="3">E6</option>
                                        </select>
                                        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#tracesModal">
                                            Traces
                                        </button>
                                        <select id="talent-level" class="form-select-sm" onchange="callStack()">
                                            <option selected value="1">Level 1</option>
                                            <option value="2">Level 2</option>
                                            <option value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                            <option value="5">Level 5</option>
                                            <option value="6">Level 6</option>
                                            <option value="7">Level 7</option>
                                            <option value="8">Level 8</option>
                                            <option value="9">Level 9</option>
                                            <option value="10">Level 10</option>
                                            <option value="11">Level 11</option>
                                            <option value="12">Level 12</option>
                                            <option value="13">Level 13</option>
                                            <option value="14">Level 14</option>
                                            <option value="15">Level 15</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#charactersModal">
                                            <img id="selected-image" class="img-fluid" src="rsc/characters/seele.png" width="96px">
                                        </button>
                                    </div>
                                    <div class="modal fade" id="charactersModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title fw-bold">Character Selections</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('arlan'); callStack()" value="arlan">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/arlan.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('asta'); callStack()" value="asta">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/asta.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('bailu'); callStack()" value="bailu">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/bailu.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('bronya'); callStack()" value="bronya">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/bronya.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('clara'); callStack()" value="clara">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/clara.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('danheng'); callStack()" value="danheng">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/danheng.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('gepard'); callStack()" value="gepard">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/gepard.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('herta'); callStack()" value="herta">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/herta.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('himeko'); callStack()" value="himeko">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/himeko.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('hook'); callStack()" value="hook">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/hook.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('jingyuan'); callStack()" value="jingyuan">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/jingyuan.png" width="64px">
                                                    </button>
                                                    <button type="dbutton" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('kafka'); callStack()" value="kafka">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/kafka.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('luocha'); callStack()" value="luocha">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/luocha.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('march 7th'); callStack()" value="mar7th">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/march 7th.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('natasha'); callStack()" value="natasha">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/natasha.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('pela'); callStack()" value="pela">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/pela.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('playerboy'); callStack()" value="playerboy">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/playerboy.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('playerboy2'); callStack()" value="playerboy2">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/playerboy2.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('playergirl'); callStack()" value="playergirl">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/playergirl.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('playergirl2'); callStack()" value="playergirl2">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/playergirl2.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('qingque'); callStack()" value="qingque">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/qingque.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('sampo'); callStack()" value="sampo">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/sampo.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('seele'); callStack()" value="seele">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/seele.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('serval'); callStack()" value="serval">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/serval.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('SilverWolf'); callStack()" value="silverwwolf">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/silverwolf.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('sushang'); callStack()" value="sushang">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/sushang.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('tingyun'); callStack()" value="tingyuan">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/tingyun.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('welt'); callStack()" value="welt">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/welt.png" width="64px">
                                                    </button>
                                                    <button type="button" class="btn char" data-bs-dismiss="modal" onclick="changeCharacter('yanqing'); callStack()" value="yangqing">
                                                        <img class="img-fluid rounded-2" src="rsc/characters/yanqing.png" width="64px">
                                                    </button>
                                                    <button class="none" id="placeholderForCharacter"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="selection-character-skills" class="row mt-2">
                                    <div class="col-4">
                                        <select id="BasicATK-level" class="form-select-sm" onchange="callStack()">
                                            <option value="0">N. Attack</option>
                                            <option value="1">Level 1</option>
                                            <option selected value="2">Level 2</option>
                                            <option  value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                            <option value="5">Level 5</option>
                                            <option value="6">Level 6</option>
                                            <option value="7">Level 7</option>
                                            <option value="8">Level 8</option>
                                            <option value="9">Level 9</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select id="Skill-level"class="form-select-sm" onchange="callStack()">
                                            <option selected value="0">Skill 1</option>
                                            <option value="1">Level 1</option>
                                            <option value="2">Level 2</option>
                                            <option value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                            <option value="5">Level 5</option>
                                            <option selected value="6">Level 6</option>
                                            <option value="7">Level 7</option>
                                            <option value="8">Level 8</option>
                                            <option value="9">Level 9</option>
                                            <option value="10">Level 10</option>
                                            <option value="11">Level 11</option>
                                            <option value="12">Level 12</option>
                                            <option value="13">Level 13</option>
                                            <option value="14">Level 14</option>
                                            <option value="15">Level 15</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select id="Ultimate-level" class="form-select-sm" onchange="callStack()">
                                            <option selected value="0">Ult</option>
                                            <option value="1">Level 1</option>
                                            <option value="2">Level 2</option>
                                            <option value="3">Level 3</option>
                                            <option value="4">Level 4</option>
                                            <option value="5">Level 5</option>
                                            <option value="6">Level 6</option>
                                            <option value="7">Level 7</option>
                                            <option selected value="8">Level 8</option>
                                            <option value="9">Level 9</option>
                                            <option value="10">Level 10</option>
                                            <option value="11">Level 11</option>
                                            <option value="12">Level 12</option>
                                            <option value="13">Level 13</option>
                                            <option value="14">Level 14</option>
                                            <option value="15">Level 15</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="selection-character-talent" class="row mt-2">
                                    <p>Character Talent: </p>
                                    <p id="chara-talent"></p>
                                </div>
                            </div>
                        </div>
                        <div id="selection-cones" class="col-sm-12 d-none d-sm-block">
                            <p id="cone-name">Fermata</p>
                            <div class="row">
                                <div class="col-7 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="col-form-label-sm" for="skills-1">Cone level</label>
                                        <input id="cone-level" type="text" class="form-control-sm" value="80" onchange="callStack()">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label class="col-form-label-sm" for="skills-1">Superimposition</label>
                                        <input id="superimposition" type="number" class="form-control-sm" value="1" onchange="callStack()">
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" value="traces6" id="cTraces6">
                                        <label class="form-check-label" for="cTraces5">Allow incompatible cones</label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#conesModal">
                                        <img id="selected-cone" class="img-fluid" src="rsc/light-cones/21022.png" style="width:120px;">
                                    </button>

                                </div>
                                <div class="row">
                                    <div id="cone-desc" class="col-12">
                                            <p>Increases the Break Effect dealt by the wearer by 16%, and increases their DMG to enemies afflicted with Shock or Wind Shear by 16%. This also applies to DoT.</p>
                                    </div>
                                </div>
                                <div class="modal fade" id="conesModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title fw-bold">Cone Selections</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- dont have 20000 picture lol -->
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20001');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20001.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20002');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20002.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20003');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20003.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20004');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20004.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20005');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20005.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20006');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20006.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20007');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20007.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20008');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20008.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20009');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20009.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20010');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20010.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20011');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20011.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20012');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20012.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20013');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20013.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20014');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20014.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20015');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20015.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20016');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20016.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20017');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20017.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20018');  callStack())">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20018.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20019');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20019.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('20020');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/20020.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21000');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21000.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21001');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21001.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21002');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21002.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21003');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21003.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21004');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21004.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21005');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21005.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21006');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21006.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21007');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21007.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21008');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21008.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21009');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21009.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21010');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21010.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21011');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21011.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21012');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21012.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21013');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21013.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21014');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21014.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21015');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21015.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21016');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21016.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21017');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21017.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21018');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21018.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21019');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21019.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21020');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21020.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21021');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21021.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21022');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21022.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21023');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21023.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21024');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21024.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21025');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21025.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21026');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21026.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21027');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21027.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21028');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21028.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21029');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21029.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21030');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21030.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21031');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21031.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21032');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21032.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21033';  callStack())">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21033.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('21034');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/21034.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23000');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23000.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23001');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23001.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23002');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23002.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23003');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23003.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23004');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23004.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23005');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23005.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23010');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23010.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('23012');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/23012.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('24000');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/24000.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('24001');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/24001.png" width="64px">
                                                </button>
                                                <button type="button" class="btn" data-bs-dismiss="modal" onclick="changeCone('24002');  callStack()">
                                                    <img class="img-fluid rounded-2" src="rsc/light-cones/24002.png" width="64px">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="form-wrapper-selection-2" class="container col-sm-3 order-sm-1 order-2 mb-sm-0 mb-3">
                <div class="row h-100">
                    <div id="selection_2" class="col-sm-12 order-2 h-100">
                        <div class="d-flex flex-row justify-content-between">
                            <a data-bs-target="#carousel_selection_2" data-bs-slide-to="0">Equipment</a> 
                            <a data-bs-target="#carousel_selection_2" data-bs-slide-to="1">Enemies</a>
                        </div>
                        <div id="carousel_selection_2" class="carousel slide">
                            <div class="carousel-item active">
                                <div id="modal-buttons" class="row">
                                    <div class="d-flex flex-row justify-content-between">
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#relicModalHead">
                                            <img  id="relic_head" class="img-fluid" src="rsc/relics_png/geniuss_head.png" width="92px">
                                        </button>
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#relicModalHands">
                                            <img id="relic_hands" class="img-fluid" src="rsc/relics_png/geniuss_hands.png" width="92px">
                                        </button>
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#relicModalSphere">
                                            <img id="relic_sphere" class="img-fluid" src="rsc/relics_png/hertas_sphere.png" width="92px">
                                        </button>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between">
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#relicModalBody">
                                            <img id="relic_body" class="img-fluid" src="rsc/relics_png/geniuss_body.png" width="92px">
                                        </button>
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#relicModalFeet">
                                            <img id="relic_feet" class="img-fluid" src="rsc/relics_png/geniuss_feet.png" width="92px">
                                        </button>
                                        <button type="button" class="btn p-0 mt-1" data-bs-toggle="modal" data-bs-target="#relicModalRope">
                                            <img id="relic_rope" class="img-fluid" src="rsc/relics_png/hertas_rope.png" width="92px">
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <div class="modal fade" id="relicModalHead" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="chooseSetSwitchHead">
                                                        <label class="form-check-label fw-bold" for="chooseSetSwitchHead">Select Relic Set</label>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/bands_head.png" width="64px" onclick="changeRelic('bands', 'head')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/champions_head.png" width="64px" onclick="changeRelic('champions', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/eagles_head.png" width="64px" onclick="changeRelic('eagles', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/firesmiths_head.png" width="64px" onclick="changeRelic('firesmiths', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/geniuss_head.png" width="64px" onclick="changeRelic('geniuss', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/guards_head.png" width="64px" onclick="changeRelic('guards', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/hunters_head.png" width="64px" onclick="changeRelic('hunters', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/knights_head.png" width="64px" onclick="changeRelic('knights', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/musketeers_head.png" width="64px" onclick="changeRelic('musketeers', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/passerbys_head.png" width="64px" onclick="changeRelic('passerbys', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/thiefs_head.png" width="64px" onclick="changeRelic('thiefs', 'head')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/wastelanders_head.png" width="64px" onclick="changeRelic('wastelanders', 'head')"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="relicModalBody" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="chooseSetSwitchBody">
                                                        <label class="form-check-label fw-bold" for="chooseSetSwitchBody">Select Relic Set</label>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/bands_body.png" width="64px" onclick="changeRelic('bands', 'body')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/champions_body.png" width="64px" onclick="changeRelic('champions', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/eagles_body.png" width="64px" onclick="changeRelic('eagles', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/firesmiths_body.png" width="64px" onclick="changeRelic('firesmiths', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/geniuss_body.png" width="64px" onclick="changeRelic('geniuss', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/guards_body.png" width="64px" onclick="changeRelic('guards', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/hunters_body.png" width="64px" onclick="changeRelic('hunters', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/knights_body.png" width="64px" onclick="changeRelic('knights', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/musketeers_body.png" width="64px" onclick="changeRelic('musketeers', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/passerbys_body.png" width="64px" onclick="changeRelic('passerbys', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/thiefs_body.png" width="64px" onclick="changeRelic('thiefs', 'body')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/wastelanders_body.png" width="64px" onclick="changeRelic('wastelanders', 'body')"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="relicModalHands" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="chooseSetSwitchHands">
                                                        <label class="form-check-label fw-bold" for="chooseSetSwitchHands">Select Relic Set</label>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/bands_hands.png" width="64px" onclick="changeRelic('bands', 'hands')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/champions_hands.png" width="64px" onclick="changeRelic('champions', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/eagles_hands.png" width="64px" onclick="changeRelic('eagles', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/firesmiths_hands.png" width="64px" onclick="changeRelic('firesmiths', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/geniuss_hands.png" width="64px" onclick="changeRelic('geniuss', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/guards_hands.png" width="64px" onclick="changeRelic('guards', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/hunters_hands.png" width="64px" onclick="changeRelic('hunters', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/knights_hands.png" width="64px" onclick="changeRelic('knights', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/musketeers_hands.png" width="64px" onclick="changeRelic('musketeers', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/passerbys_hands.png" width="64px" onclick="changeRelic('passerbys', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/thiefs_hands.png" width="64px" onclick="changeRelic('thiefs', 'hands')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/wastelanders_hands.png" width="64px" onclick="changeRelic('wastelanders', 'hands')"></button>                                         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="relicModalFeet" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="chooseSetSwitchFeet">
                                                        <label class="form-check-label fw-bold" for="chooseSetSwitchHands">Select Relic Set</label>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/bands_feet.png" width="64px" onclick="changeRelic('bands', 'feet')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/champions_feet.png" width="64px" onclick="changeRelic('champions', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/eagles_feet.png" width="64px" onclick="changeRelic('eagles', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/firesmiths_feet.png" width="64px" onclick="changeRelic('firesmiths', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/geniuss_feet.png" width="64px" onclick="changeRelic('geniuss', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/guards_feet.png" width="64px" onclick="changeRelic('guards', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/hunters_feet.png" width="64px" onclick="changeRelic('hunters', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/knights_feet.png" width="64px" onclick="changeRelic('knights', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/musketeers_feet.png" width="64px" onclick="changeRelic('musketeers', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/passerbys_feet.png" width="64px" onclick="changeRelic('passerbys', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/thiefs_feet.png" width="64px" onclick="changeRelic('thiefs', 'feet')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/wastelanders_feet.png" width="64px" onclick="changeRelic('wastelanders', 'feet')"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="relicModalSphere" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="chooseSetSwitchSphere">
                                                        <label class="form-check-label fw-bold" for="chooseSetSwitchSphere">Select Relic Set</label>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/hertas_sphere.png" width="64px" onclick="changeRelic('hertas', 'sphere')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/belobogs_sphere.png" width="64px" onclick="changeRelic('belobogs', 'sphere')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/ipcs_sphere.png" width="64px" onclick="changeRelic('ipcs', 'sphere')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/planet_sphere.png" width="64px" onclick="changeRelic('planet', 'sphere')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/salsottos_sphere.png" width="64px" onclick="changeRelic('salsottos', 'sphere')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/talias_sphere.png" width="64px" onclick="changeRelic('talias', 'sphere')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/vonwacqs_sphere.png" width="64px" onclick="changeRelic('vonwacqs', 'sphere')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/xianzhou_sphere.png" width="64px" onclick="changeRelic('xianzhou', 'sphere')"></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="relicModalRope" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="chooseSetSwitchRope">
                                                        <label class="form-check-label fw-bold" for="chooseSetSwitchRope">Select Relic Set</label>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/hertas_rope.png" width="64px" onclick="changeRelic('hertas', 'rope')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <img class="img-fluid rounded-2" src="rsc/relics_png/belobogs_rope.png" width="64px" onclick="changeRelic('belobogs', 'rope')">
                                                    </button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/ipcs_rope.png" width="64px" onclick="changeRelic('ipcs', 'rope')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/planet_rope.png" width="64px" onclick="changeRelic('planet', 'rope')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/salsottos_rope.png" width="64px" onclick="changeRelic('salsottos', 'rope')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/talias_rope.png" width="64px" onclick="changeRelic('talias', 'rope')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/vonwacqs_rope.png" width="64px" onclick="changeRelic('vonwacqs', 'rope')"></button>
                                                    <button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/xianzhou_rope.png" width="64px" onclick="changeRelic('xianzhou', 'rope')"></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="set_bonuses">
                                    
                                </div>
                              </div>
                            <div class="carousel-item">
                            <div class="d-sm-block d-flex justify-content-between mt-2">
                                <!-- need to make this two radio button -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="enemy_weak_to_element">
                                        <label class="form-check-label" for="enemy_weak_to_element">weak to current element</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"id="enemy_resist_to_element">
                                        <label class="form-check-label" for="enemy_resist_to_element">resist to current element</label>
                                    </div>
                                </div>
                                Afflicted Debuff
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="enemy_toughness_broken">
                                        <label class="form-check-label" for="enemy_toughness_broken">toughness broken</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="bleed" id="enemy_debuff_bleed">
                                        <label class="form-check-label" for="enemy_debuff_bleed">bleed</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="burn" id="enemy_debuff_burn">
                                        <label class="form-check-label" for="enemy_debuff_burn">burn</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="frozen" id="enemy_debuff_frozen">
                                        <label class="form-check-label" for="enemy_debuff_frozen">frozen</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="shock" id="enemy_debuff_shock">
                                        <label class="form-check-label" for="enemy_debuff_shock">shock</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="wind_shear" id="enemy_debuff_wind_shear">
                                        <label class="form-check-label" for="enemy_debuff_wind_shear">Wind Shear</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="entanglement" id="enemy_debuff_entanglement">
                                        <label class="form-check-label" for="enemy_debuff_entanglement">entanglement</label>
                                    </div>
                                </div>
                                <div class="d-sm-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="imprisonment" id="enemy_debuff_imprisonment">
                                        <label class="form-check-label" for="enemy_debuff_imprisonment">imprisonment</label>
                                    </div>
                                </div>
                                <div class="d-md-block d-flex justify-content-between mt-2">
                                    <div class="form-check form-check-inline">
                                        <input id="enemy-level" class="h-25 w-25 form-check-input" type="text" value="69">
                                        <label class="form-check-label" for="enemy-level">Enemy Level</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="form-wrapper-input-output" class="container col-sm-5 row-cols-1 order-sm-2 order-3 mb-sm-0 mb-3">
                <div id="form-input-stats" class="col-sm-12 row-cols-sm-1">
                    <div class="col-sm-12 row justify-content-end">
                        <div class="col-3 text-center">
                            <p>Base</p>
                        </div>
                        <div class="col-3 text-center">
                            <p>Flat</p>
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Attack</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input disabled id="base-attack" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input id="flat-attack" type="num" class="container btn btn-dark" value="1378" onchange="callStack()">
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Defense</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input disabled id="base-defense" type="num" class="container btn btn-dark" value="648">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input id="flat-defense" type="num" class="container btn btn-dark" value="71" onchange="callStack()">
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Crit Rate %</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input disabled id="base-crit-rate" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input id="flat-crit-rate" type="num" class="container btn btn-dark" value="61.5" onchange="callStack()">
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Crit Damage</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input disabled id="base-crit-dmg" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input id="flat-crit-dmg" type="num" class="container btn btn-dark" value="67,5" onchange="callStack()">
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Break Effect %</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input disabled id="base-break-effect" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        <input id="flat-break-effect" type="num" class="container btn btn-dark" value="11" onchange="callStack()">
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Elemental Damage Boost</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <input disabled id="base-elemental-boost" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <input id="flat-elemental-boost" type="num" class="container btn btn-dark" value="48,8" onchange="callStack()">
                        </div>
                    </div>
                    <div class="col-sm-12 row justify-content-end mb-3">
                        <div class="col-6 text-end">
                            <p>Elemental Penetration %</p>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <input disabled id="base-elemental-pen" type="num" class="container btn btn-dark" value="0">
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <input id="flat-elemental-pen" type="num" class="container btn btn-dark" value="0" onchange="callStack()">
                        </div>
                    </div>
                </div>
                <div id="form-output-damages" class="col-sm-12 mt-4">
                    <div class="col-12 row justify-content-end pt-2">
                        
                        <div class="col-3 text-center">
                            <p>Normal</p>
                        </div>
                        <div class="col-3 text-center">
                            <p>Crit</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 row justify-content-end mb-3">
                        <div class="col-3 text-end">
                            Normal Attack
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <input id="BasicATK-res" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <input id="BasicATK-res-crit" type="num" class="container btn btn-dark">
                        </div>
                    </div>
                    <div class="col-12 row justify-content-end mb-3">
                        <div class="col-3 text-end">
                            Skill 1
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <input id="Skill-res" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <input id="Skill-res-crit" type="num" class="container btn btn-dark">
                        </div>
                    </div>
                    <div class="col-12 row justify-content-end mb-3">
                        <div class="col-3 text-end">
                            Ultimate
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <input id="Ultimate-res" type="num" class="container btn btn-dark">
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <input id="Ultimate-res-crit" type="num" class="container btn btn-dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-list">
            <div class="modal fade" id="tracesModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title fw-bold">Character Selections</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="labelMajorTraces">
                                <label for="labelMajorTraces">Major Traces</label>
                                <div id="majorTraces" class="d-flex flex-column justify-content-evenly ">
                                    <button type="button" class="btn" onclick="addMajorTraces('Nightshade')"><p>Nightshade When current HP percentage is 50% or lower, reduces the chance of being attacked by enemies.<p></button>
                                    <button type="button" class="btn" onclick="addMajorTraces('Lacerate')"><p>Lacerate While Seele is in the buffed state, her <span style="color:#7788ff;">Quantum</span> RES PEN increases by 20%.<p></button>
                                    <button type="button" class="btn" onclick="addMajorTraces('Rippling Waves')"><p>Rippling Waves After using a Basic ATK, Seele's next action will be Advanced Forward by 20% .<p></button>
                                </div>
                            </div>
                            <div id="labelMinorTraces">
                                <label for="labelMinorTraces">MinorTraces</label>
                                <div id="minorTraces">
                                    <button type="button" class="btn" onclick="addMinorTraces('ATK', 0.04)"><p>ATK Boost 4.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('CRIT DMG', 0.053)"><p>CRIT DMG Boost 5.3%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('ATK', 0.04)"><p>ATK Boost 4.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('DEF', 0.05)"><p>DEF Boost 5.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('ATK', 0.06)"><p>ATK Boost 6.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('CRIT DMG', 0.08)"><p>CRIT DMG Boost 8.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('ATK', 0.06)"><p>ATK Boost 6.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('CRIT DMG', 0.107)"><p>CRIT DMG Boost 10.7%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('ATK', 0.08)"><p>ATK Boost 8.0%<p></button>
                                    <button type="button" class="btn" onclick="addMinorTraces('DEF', 0.075)"><p>DEF Boost 7.5%<p></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="queryToDB.js"></script>
    <script src="charactersAndLightCones.js"></script>
    <script src="characterTraces.js"></script>
    <script src="calculateBaseStats.js"></script>
    <script src="calculateDamage.js"></script>
    <script src="main.js"></script>
</html>