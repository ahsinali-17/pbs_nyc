@extends('frontend.master')

@php($pageTitle ='NYC DOB Code')

@section('meta')
    {{--meta etiketleri--}}
@stop

@section('css')
    {{--css kodları--}}
    <!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="{{asset('css/components/bs-datatable.css')}}"
          type="text/css"/>
@stop

@section('slider')
    {{--slider bölümü--}}
@stop

@section('content')
    {{--content bölümü--}}
    <!--		Iceriklerrrr -->
    <section class="bg-transparent" id="nycdonkodlari">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row"><h2>NYC 2014 Construction Codes</h2>
                    <p>The NYC Construction Codes consist of the General Administrative Provisions, Building Code,
                        Plumbing Code, Mechanical Code, Fuel Gas Code, and Energy Conservation Code.</p>
                </div>

                <div class="divider divider-center"><img src="{{ asset('images/others/dividerlogo50.png') }}"
                                                         width="30px"/></div>

                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped text-white table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 34%;">Section</th>
                            <th style="width: 12%;">Chapter</th>
                            <th style="width: 45%;">Name</th>
                            <th style="width: 4%;">Link</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 34%;">Section</th>
                            <th style="width: 12%;">Chapter</th>
                            <th style="width: 45%;">Name</th>
                            <th style="width: 4%;">Link</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>GENERAL ADMINISTRATIVE PROVISIONS</td>
                            <td>CHAPTER 1</td>
                            <td>ADMINISTRATION</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_AC_Chapter1_Administration.pdf&amp;section=conscode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>GENERAL ADMINISTRATIVE PROVISIONS</td>
                            <td>CHAPTER 2</td>
                            <td>ENFORCEMENT</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_AC_Chapter2_Enforcement.pdf&amp;section=conscode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>GENERAL ADMINISTRATIVE PROVISIONS</td>
                            <td>CHAPTER 3</td>
                            <td>MAINTENANCE OF BUILDINGS</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_AC_Chapter3_Maintenance_of_Buildings.pdf&amp;section=conscode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>GENERAL ADMINISTRATIVE PROVISIONS</td>
                            <td>CHAPTER 4</td>
                            <td>LICENSING AND REGISTRATION OF BUSINESSES, TRADES AND OCCUPATIONS ENGAGED IN BUILDINGWORK
                            </td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_AC_Chapter4_Licensing_and_Registration.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>GENERAL ADMINISTRATIVE PROVISIONS</td>
                            <td>CHAPTER 5</td>
                            <td>MISCELLANEOUS PROVISIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_AC_Chapter5_Miscellaneous.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 1</td>
                            <td>ADMINISTRATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter1_Administration.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 2</td>
                            <td>DEFINITIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter2_Definitions.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 3</td>
                            <td>GENERAL REGULATIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter3_General_Regulations.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 4</td>
                            <td>FIXTURES, FAUCETS AND FIXTURE FITTINGS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter4_Fixtures_Faucets_and_Fixture_Fittings.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 5</td>
                            <td>WATER HEATERS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter5_Water_Heaters.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 6</td>
                            <td>WATER SUPPLY AND DISTRIBUTION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter6_Water_Supply_and_Distribution.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 7</td>
                            <td>SANITARY DRAINAGE</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter7_Sanitary_Drainage.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 8</td>
                            <td>INDIRECT/SPECIAL WASTE</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter8_Indirect_Special_Waste.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 9</td>
                            <td>VENTS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter9_Vents.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 10</td>
                            <td>TRAPS, INTERCEPTORS AND SEPARATORS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter10_Traps_Interceptors_and_Separators.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 11</td>
                            <td>STORM DRAINAGE</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter11_Storm_Drainage.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 12</td>
                            <td>SPECIAL PIPING AND STORAGE SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter12_Special_Piping_and_Storage_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>PLUMBING CODE</td>
                            <td>CHAPTER 13</td>
                            <td>REFERENCED STANDARDS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_Chapter13_Referenced_Standards.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX A</td>
                            <td>PLUMBING PERMIT FEE SCHEDULE (RESERVED)</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixA_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX B</td>
                            <td>RATES OF RAINFALL FOR VARIOUS CITIES (RESERVED)</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixB_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX C</td>
                            <td>WATER RECYCLING SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixC_Water_Conservation_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX D</td>
                            <td>DEGREE DAY AND DESIGN TEMPERATURES (RESERVED)</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixD_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX E</td>
                            <td>SIZING OF WATER PIPING SYSTEM</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixE_Sizing_of_Water_Piping_System.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX F</td>
                            <td>STRUCTURAL SAFETY (RESERVED)</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixF_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>PLUMBING CODE</td>
                            <td>APPENDIX G</td>
                            <td>VACUUM DRAINAGE SYSTEM (RESERVED)</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_PC_AppendixG_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 1</td>
                            <td>ADMINISTRATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter1_Administration.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 2</td>
                            <td>DEFINITIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter2_Definitions.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 3</td>
                            <td>GENERAL REGULATIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter3_General_Regulations.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 4</td>
                            <td>VENTILATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter4_Ventilation.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 5</td>
                            <td>EXHAUST SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter5_Exhaust_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 6</td>
                            <td>DUCT SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter6_Duct_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 7</td>
                            <td>COMBUSTION, VENTILATION AND DILUTION AIR</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter7_Combustion_Air.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 8</td>
                            <td>CHIMNEYS AND VENTS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter8_Chimney_and_Vents.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 9</td>
                            <td>SPECIFIC APPLIANCES, FIREPLACES AND SOLID FUEL-BURNING EQUIPMENT AND NOISE
                                CONTROLREQUIREMENTS
                            </td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter9_Specific_Appliances.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 10</td>
                            <td>BOILERS, WATER HEATERS AND PRESSURE VESSELS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter10_Boilers_Water_Heaters.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 11</td>
                            <td>REFRIGERATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter11_Refrigeration.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 12</td>
                            <td>HYDRONIC PIPING</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter12_Hydronic_Piping.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 13</td>
                            <td>FUEL-OIL PIPING AND STORAGE</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter13_Fuel_Oil_Piping_and_Storage.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 14</td>
                            <td>SOLAR SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter14_Solar_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>MECHANICAL CODE</td>
                            <td>CHAPTER 15</td>
                            <td>REFERENCED STANDARDS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_Chapter15_Referenced_Standards.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td>MECHANICAL CODE</td>
                            <td>APPENDIX A</td>
                            <td>COMBUSTION AIR OPENINGS AND CHIMNEY CONNECTOR PASS-THROUGHS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_AppendixA_Combustion_Air_Openings.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>MECHANICAL CODE</td>
                            <td>APPENDIX B</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_MC_AppendixB_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 1</td>
                            <td>ADMINISTRATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter1_Administration.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 2</td>
                            <td>DEFINITIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter2_Definitions.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>45</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 3</td>
                            <td>GENERAL REGULATIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter3_General_Regulations.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 4</td>
                            <td>GAS PIPING INSTALLATIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter4_Gas_Piping_Installations.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>47</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 5</td>
                            <td>CHIMNEYS AND VENTS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter5_Chimneys_and_Vents.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>48</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 6</td>
                            <td>SPECIFIC APPLIANCES</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter6_Specific_Appliances.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>49</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 7</td>
                            <td>GASEOUS HYDROGEN SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter7_Gaseous_Hydrogen_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>50</td>
                            <td>FUEL GAS CODE</td>
                            <td>CHAPTER 8</td>
                            <td>REFERENCED STANDARDS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_Chapter8_Referenced_Standards.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>51</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX A</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixA_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>52</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX B</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixB_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>53</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX C</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixC_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>54</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX D</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixD_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>55</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX E</td>
                            <td>METERS AND GAS SERVICE PIPING</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixE_Meters_and_Gas_Service_Piping.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>56</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX F</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixF_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>57</td>
                            <td>FUEL GAS CODE</td>
                            <td>APPENDIX G</td>
                            <td>HIGH PRESSURE NATURAL GAS INSTALLATIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_FGC_AppendixG_High_Pressure_Natural_Gas.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>58</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 1</td>
                            <td>ADMINISTRATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_1_Administration.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>59</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 2</td>
                            <td>DEFINITIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_2_Definitions.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>60</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 3</td>
                            <td>USE AND OCCUPANCY CLASSIFICATION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_3_Use_and_Occupancy_Classification.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>61</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 4</td>
                            <td>SPECIAL DETAILED REQUIREMENTS BASED ON USE AND OCCUPANCY</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_4_Special_Detailed_Requirements.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>62</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 5</td>
                            <td>GENERAL BUILDING HEIGHTS AND AREAS; SEPARATION OF OCCUPANCIES</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_5_General_Building_Heights_and_Areas.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>63</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 6</td>
                            <td>TYPES OF CONSTRUCTION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_6_Types_of_Construction.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>64</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 7</td>
                            <td>FIRE AND SMOKE PROTECTION FEATURES</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_7_Fire-Resistance-Rated_Construction.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>65</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 8</td>
                            <td>INTERIOR FINISHES</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_8_Interior_Finishes.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>66</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 9</td>
                            <td>FIRE PROTECTION SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_9_Fire_Protection_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>67</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 10</td>
                            <td>MEANS OF EGRESS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapte_10_Means_of_Egress.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>68</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 11</td>
                            <td>ACCESSIBILITY</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_11_Accessibility.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>69</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 12</td>
                            <td>INTERIOR ENVIRONMENT</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_12_Interior_Environment.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>70</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 13</td>
                            <td>ENERGY EFFICIENCY</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_13_Energy_Efficiency.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>71</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 14</td>
                            <td>EXTERIOR WALLS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_14_Exterior_Walls.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>72</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 15</td>
                            <td>ROOF ASSEMBLIES AND ROOFTOP STRUCTURES</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_15_Roof_Assemblies_and_Rooftop_Structures.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>73</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 16</td>
                            <td>STRUCTURAL DESIGN</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_16_Structural_Design.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>74</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 17</td>
                            <td>STRUCTURAL TESTS AND SPECIAL INSPECTIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_17_Structural_Tests_and_Special_Inspections.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>75</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 18</td>
                            <td>SOILS AND FOUNDATIONS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_18_Soils_and_Foundations.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>76</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 19</td>
                            <td>CONCRETE</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_19_Concrete.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>77</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 20</td>
                            <td>ALUMINUM</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_20_Aluminum.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>78</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 21</td>
                            <td>MASONRY</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_21_Masonry.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>79</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 22</td>
                            <td>STEEL</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_22_Steel.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>80</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 23</td>
                            <td>WOOD</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_23_Wood.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>81</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 24</td>
                            <td>GLASS AND GLAZING</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_24_Glass_and_Glazing.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>82</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 25</td>
                            <td>GYPSUM BOARD AND PLASTER</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_25_Gypsum_Board_and_Plaster.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>83</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 26</td>
                            <td>PLASTIC</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_26_Plastic.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>84</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 27</td>
                            <td>ELECTRICAL</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_27_Electrical.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>85</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 28</td>
                            <td>MECHANICAL SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_28_Mechanical_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>86</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 29</td>
                            <td>PLUMBING SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_29_Plumbing_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>87</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 30</td>
                            <td>ELEVATORS AND CONVEYING SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_30_Elevators_and_Conveying_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>88</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 31</td>
                            <td>SPECIAL CONSTRUCTION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_31_Special_Construction.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>89</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 32</td>
                            <td>ENCROACHMENTS INTO THE PUBLIC RIGHT-OF-WAY</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_32_Encroachments_into_the_Pulic_Right_of_Way.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>90</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 33</td>
                            <td>SAFEGUARDS DURING CONSTRUCTION OR DEMOLITION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_33_Safeguards_During_Construction_or_Demo.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>91</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 34</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_34_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>92</td>
                            <td>BUILDING CODE</td>
                            <td>CHAPTER 35</td>
                            <td>REFERENCED STANDARDS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Chapter_35_Reference_Standards.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>93</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX A</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_A_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>94</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX B</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_B_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>95</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX C</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_C_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>96</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX D</td>
                            <td>FIRE DISTRICTS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_D_Fire_Districts.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>97</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX E</td>
                            <td>SUPPLEMENTARY ACCESSIBILITY REQUIREMENTS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_E_Supplementary_Accessibility_Requirements.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>98</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX F</td>
                            <td>RODENT-PROOFING</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_F_Rodent-Proofing.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>99</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX G</td>
                            <td>FLOOD-RESISTANT CONSTRUCTION</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_G_Flood-Resistant_Construction.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX H</td>
                            <td>OUTDOOR SIGNS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_H_Outdoor_Signs.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>101</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX I</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_I_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>102</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX J</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_J_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>103</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX K</td>
                            <td>MODIFIED INDUSTRY STANDARDS FOR ELEVATORS AND CONVEYING SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_K_Elevators_%26_Conveying_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>104</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX L</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_L_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>105</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX M</td>
                            <td>SUPPLEMENTARY REQUIREMENTS FOR ONE- AND TWO-FAMILY DWELLINGS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_M_Supplementary_Requirements.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>106</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX N</td>
                            <td>ASSISTIVE LISTENING SYSTEMS PERFORMANCE STANDARDS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_N_Assistive_Listening_Systems.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>107</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX O</td>
                            <td>RESERVED</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_O_Reserved.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>108</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX P</td>
                            <td>TYPE B+NYC UNIT TOILET AND BATHING ROOMS REQUIREMENTS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_P_R-2_Occupancy_Toilet_Requirements.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>109</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX Q</td>
                            <td>MODIFIED NATIONAL STANDARDS FOR AUTOMATIC SPRINKLER, STANDPIPE, FIRE PUMP AND FIRE
                                ALARMSYSTEMS
                            </td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_Q_Modified_Standards.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>110</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX R</td>
                            <td>ACOUSTICAL TILE AND LAY-IN PANEL CEILING SUSPENSION SYSTEMS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_R_Acoustical_Tile.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>111</td>
                            <td>BUILDING CODE</td>
                            <td>APPENDIX S</td>
                            <td>SUPPLEMENTARY FIGURES FOR LUMINOUS EGRESS PATH MARKINGS</td>
                            <td class="text-center h6 my-auto">
                                <a href="https://www1.nyc.gov/assets/buildings/apps/pdf_viewer/viewer.html?file=2014CC_BC_Appendix_S_Photoluminescent.pdf&amp;section=conscode_2014"
                                   target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    {{--javascript bölümü--}}

    <script src="{{asset('js/components/bs-datatable.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#datatable1').dataTable({
                "scrollX": true,
                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
            });
        });
    </script>
@stop
