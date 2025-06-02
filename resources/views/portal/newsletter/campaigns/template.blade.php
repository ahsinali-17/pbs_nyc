@extends('mails.master')


@section('css')
    <style>

        table.anatablo > tbody > tr > td {
            padding: 30px;
        }

        .img {
            padding-bottom: 5px;
        }
    </style>
@stop

@section('content')
    <tr>
        <td>
            <hr>
        </td>
    </tr>
    <tr>
        <td class="td container" id="basecontent"
            style="width:100%; font-size:10pt; line-height:10pt; margin:0; font-weight:normal; padding-right: 5px; padding-left: 5px;">
            {!! str_replace("<p><br></p>","",$content) !!}
        </td>
    </tr>
    <tr>
        <td>
            <hr>
        </td>
    </tr>
@append

@section('js')

@stop
