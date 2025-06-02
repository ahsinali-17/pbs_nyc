@extends('frontend.master')

@php($pageTitle ='NYC FDNY Code')

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

    <section class="bg-transparent" id="nycfirecode">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row"><h2>NYC Fire Code</h2>
                    <p>Updated in 2014, the New York City Fire Code is a City law that establishes fire safety
                        requirements for buildings and businesses in New York City. It applies to all persons and places
                        in New York City.</p>
                    <p>The Fire Code regulates such matters as emergency preparedness; the prevention and reporting of
                        fires; the manufacture, storage, handling, use and transportation of hazardous
                        materials and
                        combustible materials; the conduct of various businesses and activities that pose fire hazards;
                        and
                        the design, installation, operation and maintenance of the buildings and
                        premises that
                        house such materials, businesses and activities.</p>

                    <p>Fire Code Chapters 1 and 3 have been revised to reflect the amendments to Sections FC 105.6
                        and
                        310 enacted by Local Law No. 187 of 2017, effective April 17, 2018.</p>
                </div>

                <div class="divider divider-center"><img src="{{ asset('images/others/dividerlogo50.png') }}"
                                                         width="30px"/></div>

                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped text-white table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 12%;">Chapter</th>
                            <th style="width: 79%;">Name</th>
                            <th style="width: 4%;">Link</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 12%;">Chapter</th>
                            <th style="width: 79%;">Name</th>
                            <th style="width: 4%;">Link</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Chapter 1</td>
                            <td>Administration</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-01.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Chapter 2</td>
                            <td>Definitions</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-02.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Chapter 3</td>
                            <td>General Precautions Against Fire</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-03.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Chapter 4</td>
                            <td>Emergency Planning and Preparedness</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-04.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Chapter 5</td>
                            <td>Fire Operations Features</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-05.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Chapter 6</td>
                            <td>Building Services And Systems</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-06.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Chapter 7</td>
                            <td>Fire-Resistance Rated Construction</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-07.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Chapter 8</td>
                            <td>Interior Furnishings, Decorations And Scenery</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-08.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Chapter 9</td>
                            <td>Fire Protection Systems</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-09.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Chapter 10</td>
                            <td>Means of Egress</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-10.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Chapter 11</td>
                            <td>Aviation Facilities And Operations</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-11.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Chapter 12</td>
                            <td>Dry Cleaning</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-12.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Chapter 13</td>
                            <td>Combustible Dust-Producing Operations</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-13.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Chapter 14</td>
                            <td>Fire Safety During Construction, Alteration & Demolition</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-14.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Chapter 15</td>
                            <td>Flammable Finishes</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-15.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Chapter 16</td>
                            <td>Fruit and Crop Ripening</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-16.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Chapter 17</td>
                            <td>Fumigation and Insecticidal Fogging</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-17.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Chapter 18</td>
                            <td>Semiconductor Fabrication Facilities</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-18.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Chapter 19</td>
                            <td>Lumber Yards and Wood Waste Materials</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-19.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Chapter 20</td>
                            <td>Manufacture of Organic Coatings</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-20.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>Chapter 21</td>
                            <td>Industrial Furnaces</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-21.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>Chapter 22</td>
                            <td>Motor Fuel - Dispensing Facilities and Repair Garages</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-22.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>Chapter 23</td>
                            <td>High-Piled Combustible Storage</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-23.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>Chapter 24</td>
                            <td>Tents and Other Membrane Structures</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-24.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>Chapter 25</td>
                            <td>Tire Rebuilding and Tire Storage</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-25.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>Chapter 26</td>
                            <td>Welding and Other Hot Work</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-26.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>Chapter 27</td>
                            <td>Hazardous Materials - General Provisions</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-27.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td>Chapter 28</td>
                            <td>Aerosols</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-28.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>Chapter 29</td>
                            <td>Combustible Fibers</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-29.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>Chapter 30</td>
                            <td>Compressed Gases</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-30.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td>Chapter 31</td>
                            <td>Corrosive Materials</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-31.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td>Chapter 32</td>
                            <td>Cryogenic Fluids</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-32.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>Chapter 33</td>
                            <td>Explosives, Fireworks and Special Effects</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-33.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td>Chapter 34</td>
                            <td>Flammable and Combustible Liquids</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-34.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td>Chapter 35</td>
                            <td>Flammable Gases</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-35.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>Chapter 36</td>
                            <td>Flammable Solids</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-36.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td>Chapter 37</td>
                            <td>Highly Toxic and Toxic Materials</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-37.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td>Chapter 38</td>
                            <td>Liquefied Petroleum Gases</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-38.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td>Chapter 39</td>
                            <td>Organic Peroxides</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-39.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>Chapter 40</td>
                            <td>Oxidizers, Oxidizing Gases and Oxidizing Cryogenic Fluids</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-40.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td>Chapter 41</td>
                            <td>Pyrophoric Materials</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-41.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td>Chapter 42</td>
                            <td>Pyroxylin Plastics</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-42.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td>Chapter 43</td>
                            <td>Unstable (Reactive) Materials</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-43.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td>Chapter 44</td>
                            <td>Water-Reactive Solids and Liquids</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-44.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>45</td>
                            <td>Chapter 45</td>
                            <td>Referenced Standards</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-45.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>Appendix A</td>
                            <td>Fees</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-app-a.pdf&amp;section=firecode_2014"
                                    target="_blank"><i class="text-danger icon-file-pdf"></i></a></td>
                        </tr>
                        <tr>
                            <td>47</td>
                            <td>Appendix B</td>
                            <td>Referenced Standard Modifications</td>
                            <td class="text-center h6 my-auto"><a
                                    href="https://www1.nyc.gov/assets/fdny/pdfviewer/viewer.html?file=Chapter-app-b.pdf&amp;section=firecode_2014"
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
        // jQuery(window).on('load', function () {
        //
        //     $('#icons-filter').typing({
        //         stop: function (event, $elem) {
        //             var filterValue = $elem.val(),
        //                 count = 0;
        //
        //             if ($elem.val()) {
        //
        //                 $(".selam p").not('.baslik').each(function () {
        //                     if ($(this).text().search(new RegExp(filterValue, "i")) < 0) {
        //                         $(this).fadeOut();
        //                     } else {
        //                         $(this).show();
        //                         count++
        //                     }
        //                 });
        //
        //                 if (count > 0) {
        //                     $('#icons-filter-result').html('There are <strong>' + count + ' < /strong> codes in database shown in below');
        //                 } else {
        //                     $('#icons-filter-result').html('No Icons Found.');
        //                 }
        //
        //             } else {
        //                 $(".selam p").show();
        //                 $('#icons-filter-result').html('');
        //             }
        //
        //             count = 0;
        //         },
        //         delay: 500
        //     });
        // });

    </script>
@stop
