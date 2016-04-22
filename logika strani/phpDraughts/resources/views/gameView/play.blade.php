@extends('layouts.app')

@section('content')
    <div align="center" class="table-responsive">
        <svg width="800" height="800"  viewBox="0 0 800 800" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <style type="text/css">
                    text { font-size:40pt; font-family: sans-serif; text-anchor: middle; fill:#ffa; }
                </style>
                <rect id="lightsquare" x="0" y="0" width="1" height="1" style="fill:white;"/>
                <rect id="darksquare" x="0" y="0" width="1" height="1" style="fill:black;"/>
                <g id="lightrow">
                    <use xlink:href="#lightsquare" x="1"/>
                    <use xlink:href="#darksquare" x="2"/>
                    <use xlink:href="#lightsquare" x="3"/>
                    <use xlink:href="#darksquare" x="4"/>
                    <use xlink:href="#lightsquare" x="5"/>
                    <use xlink:href="#darksquare" x="6"/>
                    <use xlink:href="#lightsquare" x="7"/>
                    <use xlink:href="#darksquare" x="8"/>
                </g>
                <g id="darkrow">
                    <use xlink:href="#darksquare" x="1"/>
                    <use xlink:href="#lightsquare" x="2"/>
                    <use xlink:href="#darksquare" x="3"/>
                    <use xlink:href="#lightsquare" x="4"/>
                    <use xlink:href="#darksquare" x="5"/>
                    <use xlink:href="#lightsquare" x="6"/>
                    <use xlink:href="#darksquare" x="7"/>
                    <use xlink:href="#lightsquare" x="8"/>
                </g>
            </defs>
            <g transform="scale(100,100) translate(-1,-1)">
                <!-- The board -->
                <use xlink:href="#lightrow" y="1"/>
                <use xlink:href="#darkrow" y="2"/>
                <use xlink:href="#lightrow" y="3"/>
                <use xlink:href="#darkrow" y="4"/>
                <use xlink:href="#lightrow" y="5"/>
                <use xlink:href="#darkrow" y="6"/>
                <use xlink:href="#lightrow" y="7"/>
                <use xlink:href="#darkrow" y="8"/>
            </g>
            <!-- The labels -->
            <g>
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
            </g>
        </svg>
    </div>
@endsection