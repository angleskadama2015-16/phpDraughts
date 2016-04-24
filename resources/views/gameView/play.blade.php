@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".darkUse").click(function(){
                $currentColor=$(event.target).attr("xlink:href");
                if($currentColor=="#darksquare") {
                    $(event.target).attr("xlink:href", "#redsquare");
                }
                else{
                    $(event.target).attr("xlink:href", "#darksquare");
                }
                $x=$(this).attr('x'); //koordinata x
                $y=$(this).attr('y'); //koordinata y
                $zaporedna=$(this).attr('name'); //v name hranimo zaporedno številko polja
                alert("x:"+$x+" y:"+$y+" st. crnega polja: "+$zaporedna);
            });
        });
    </script>
    <div align="center" class="table-responsive">
        <svg width="800" height="800"  viewBox="0 0 800 800" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <style type="text/css">
                    text { font-size:40pt; font-family: sans-serif; text-anchor: middle; fill:#feb; }
                </style>
                <rect id="lightsquare" x="0" y="0" width="1" height="1" style="fill:white;"/>
                <rect id="darksquare" x="0" y="0" width="1" height="1" style="fill:black;"/>
                <rect id="redsquare" x="0" y="0" width="1" height="1" style="fill:red;"/>
            </defs>
            <g transform="scale(100,100) translate(-1,-1)">
                <!-- The board -->
                <g y="1" class="lightrow">
                    <use xlink:href="#lightsquare" x="1" y="1"/>
                    <use class="darkUse" xlink:href="#darksquare" x="2" y="1" name="1"/>
                    <use xlink:href="#lightsquare" x="3" y="1"/>
                    <use class="darkUse" xlink:href="#darksquare" x="4" y="1" name="2"/>
                    <use xlink:href="#lightsquare" x="5" y="1"/>
                    <use class="darkUse" xlink:href="#darksquare" x="6" y="1" name="3"/>
                    <use xlink:href="#lightsquare" x="7" y="1"/>
                    <use class="darkUse" xlink:href="#darksquare" x="8" y="1" name="4"/>
                </g>
                <g y="2" class="darkrow">
                    <use class="darkUse" xlink:href="#darksquare" x="1" y="2" name="5"/>
                    <use xlink:href="#lightsquare" x="2" y="2"/>
                    <use class="darkUse" xlink:href="#darksquare" x="3" y="2" name="6"/>
                    <use xlink:href="#lightsquare" x="4" y="2"/>
                    <use class="darkUse" xlink:href="#darksquare" x="5" y="2" name="7"/>
                    <use xlink:href="#lightsquare" x="6" y="2"/>
                    <use class="darkUse" xlink:href="#darksquare" x="7" y="2" name="8"/>
                    <use xlink:href="#lightsquare" x="8" y="2"/>
                </g>
                <g y="3" class="lightrow">
                    <use xlink:href="#lightsquare" x="1" y="3"/>
                    <use class="darkUse" xlink:href="#darksquare" x="2" y="3" name="9"/>
                    <use xlink:href="#lightsquare" x="3" y="3"/>
                    <use class="darkUse" xlink:href="#darksquare" x="4" y="3" name="10"/>
                    <use xlink:href="#lightsquare" x="5" y="3"/>
                    <use class="darkUse" xlink:href="#darksquare" x="6" y="3" name="11"/>
                    <use xlink:href="#lightsquare" x="7" y="3"/>
                    <use class="darkUse" xlink:href="#darksquare" x="8" y="3" name="12"/>
                </g>
                <g y="4" class="darkrow">
                    <use class="darkUse" xlink:href="#darksquare" x="1" y="4" name="13"/>
                    <use xlink:href="#lightsquare" x="2" y="4"/>
                    <use class="darkUse" xlink:href="#darksquare" x="3" y="4" name="14"/>
                    <use xlink:href="#lightsquare" x="4" y="4"/>
                    <use class="darkUse" xlink:href="#darksquare" x="5" y="4" name="15"/>
                    <use xlink:href="#lightsquare" x="6" y="4"/>
                    <use class="darkUse" xlink:href="#darksquare" x="7" y="4" name="16"/>
                    <use xlink:href="#lightsquare" x="8" y="4"/>
                </g>
                <g y="5" class="lightrow">
                    <use xlink:href="#lightsquare" x="1" y="5"/>
                    <use class="darkUse" xlink:href="#darksquare" x="2" y="5" name="17"/>
                    <use xlink:href="#lightsquare" x="3" y="5"/>
                    <use class="darkUse" xlink:href="#darksquare" x="4" y="5" name="18"/>
                    <use xlink:href="#lightsquare" x="5" y="5"/>
                    <use class="darkUse" xlink:href="#darksquare" x="6" y="5" name="19"/>
                    <use xlink:href="#lightsquare" x="7" y="5"/>
                    <use class="darkUse" xlink:href="#darksquare" x="8" y="5" name="20"/>
                </g>
                <g y="6" class="darkrow">
                    <use class="darkUse" xlink:href="#darksquare" x="1" y="6" name="21"/>
                    <use xlink:href="#lightsquare" x="2" y="6"/>
                    <use class="darkUse" xlink:href="#darksquare" x="3" y="6" name="22"/>
                    <use xlink:href="#lightsquare" x="4" y="6"/>
                    <use class="darkUse" xlink:href="#darksquare" x="5" y="6" name="23"/>
                    <use xlink:href="#lightsquare" x="6" y="6"/>
                    <use class="darkUse" xlink:href="#darksquare" x="7" y="6" name="24"/>
                    <use xlink:href="#lightsquare" x="8" y="6"/>
                </g>
                <g y="5" class="lightrow">
                    <use xlink:href="#lightsquare" x="1" y="7"/>
                    <use class="darkUse" xlink:href="#darksquare" x="2" y="7" name="25"/>
                    <use xlink:href="#lightsquare" x="3" y="7"/>
                    <use class="darkUse" xlink:href="#darksquare" x="4" y="7" name="26"/>
                    <use xlink:href="#lightsquare" x="5" y="7"/>
                    <use class="darkUse" xlink:href="#darksquare" x="6" y="7" name="27"/>
                    <use xlink:href="#lightsquare" x="7" y="7"/>
                    <use class="darkUse" xlink:href="#darksquare" x="8" y="7" name="28"/>
                </g>
                <g y="6" class="darkrow">
                    <use class="darkUse" xlink:href="#darksquare" x="1" y="8" name="29"/>
                    <use xlink:href="#lightsquare" x="2" y="8"/>
                    <use class="darkUse" xlink:href="#darksquare" x="3" y="8" name="30"/>
                    <use xlink:href="#lightsquare" x="4" y="8"/>
                    <use class="darkUse" xlink:href="#darksquare" x="5" y="8" name="31"/>
                    <use xlink:href="#lightsquare" x="6" y="8"/>
                    <use class="darkUse" xlink:href="#darksquare" x="7" y="8" name="32"/>
                    <use xlink:href="#lightsquare" x="8" y="8"/>
                </g>
            </g>
            <!-- The labels -->
            <!--<g>
                <text x="150" y="70" >1</text>
                <text x="350" y="70" >2</text>
                <text x="550" y="70" >3</text>
                <text x="750" y="70" >4</text>
                <text x="50"  y="170">5</text>
                <text x="250" y="170">6</text>
                <text x="450" y="170">7</text>
                <text x="650" y="170">8</text>
                <text x="150" y="270">9</text>
                <text x="350" y="270">10</text>
                <text x="550" y="270">11</text>
                <text x="750" y="270">12</text>
                <text x="50"  y="370">13</text>
                <text x="250" y="370">14</text>
                <text x="450" y="370">15</text>
                <text x="650" y="370">16</text>
                <text x="150" y="470">17</text>
                <text x="350" y="470">18</text>
                <text x="550" y="470">19</text>
                <text x="750" y="470">20</text>
                <text x="50"  y="570">21</text>
                <text x="250" y="570">22</text>
                <text x="450" y="570">23</text>
                <text x="650" y="570">24</text>
                <text x="150" y="670">25</text>
                <text x="350" y="670">26</text>
                <text x="550" y="670">27</text>
                <text x="750" y="670">28</text>
                <text x="50"  y="770">29</text>
                <text x="250" y="770">30</text>
                <text x="450" y="770">31</text>
                <text x="650" y="770">32</text>
            </g>-->
        </svg>
    </div>
@endsection