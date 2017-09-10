@extends('layout.master')
@section('title', 'BDO Market Timer')
@section('content')
    <!-- Scripts etc. -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesomplete.css') }}" />
    <script src="{{ URL::asset('js/awesomplete.js') }}" async></script>

    <script src="{{ URL::asset('js/utility.js') }}"></script>
    <script src="{{ URL::asset('js/time.js') }}"></script>
{{--    <script src="{{ URL::asset('js/all-items.js') }}"></script>--}}
    <style>
        #current-time-hm
        {
            font-size: 4em;
            font-weight: 300;
        }
        #current-time-s
        {
            font-size: 1em;
            font-weight: 300;
            margin-left: 8px;
        }
    </style>

    @if($next_item != null)
        @include('shared.timerbar', ['itemname' => $next_item[0], 'enhancement' => $next_item[1],
                'accumulatedtrades' => $next_item[2], 'offset' => $next_item[3], 'time' => $next_item[4]])
    @endif

    <div class="col-xs-12 time-format-buttons">
        <label class="switch">
            <input type="checkbox" id="time-format-button" onchange="setTimeFormatCookie();">
            <div class="slider"><div class="slider-l">24h</div><div class="slider-r text-right">12h</div></div>
        </label>
    </div>

    <div class="container">

        <div class="content">
            <div class="current-time-wrapper text-center">
                <div id="current-time-hm">00 00</div>
                <div id="current-time-s">00</div>
            </div>

            {{--<div class="game-time-wrapper text-center">--}}
                {{--<div class="col-md-3 col-md-offset-3">--}}
                    {{--<span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-icon" aria-hidden="true"></i></span>--}}
                    {{--<span id="game-time">00 00</span>--}}
                {{--</div>--}}
                {{--<div class="col-md-3 dim">--}}
                    {{--<span class="game-time-icon"><i class="fa fa-moon-o" id="day-night-changeover-icon" aria-hidden="true"></i></span>--}}
                    {{--<span id="game-time-to-changeover">00 00</span>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-xs-8 col-xs-offset-2">
                <table class="table table-hover table-bordered text-center text-muted">
                    <thead>
                    <tr>
                        <th>FS</th>
                        <th class="">Blue</th>
                        <th>Yellow</th>
                        <th>FS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="col-xs-5 table-no-content" rowspan="4"></td>
                        <td class="table-no-content"></td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="col-xs-5 table-content" rowspan="2" class="valign">+6</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="col-xs-5 table-content" rowspan="2">+7</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="col-xs-5 table-content" rowspan="3">+8</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="col-xs-5 table-content" rowspan="3">+8</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="col-xs-5 table-content" rowspan="3">+9</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="col-xs-5 table-content" rowspan="3">+9</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="col-xs-5 table-content" rowspan="2">+10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="col-xs-5 table-content" rowspan="2">+10</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td class="col-xs-5 table-content" rowspan="2">+11</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td class="col-xs-5 table-content" rowspan="2">+11</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td class="col-xs-5 table-content" rowspan="2">+12</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td class="col-xs-5 table-content" rowspan="2">+12</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td class="col-xs-5 table-content">+13</td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td class="col-xs-5 table-content" rowspan="2">+14</td>
                        <td class="col-xs-5 table-content" rowspan="2">+13</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td class="col-xs-5 table-content" rowspan="6">+15 / PRI</td>
                        <td class="col-xs-5 table-content" rowspan="6">+14 / 15 / PRI</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td class="col-xs-5 table-content" rowspan="5">DUO</td>
                        <td class="col-xs-5 table-content" rowspan="7">DUO</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>27</td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>29</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>31</td>
                        <td class="col-xs-5 table-content" rowspan="10">TRI</td>
                        <td>31</td>
                    </tr>
                    <tr>
                        <td>32</td>
                        <td>32</td>
                    </tr>
                    <tr>
                        <td>33</td>
                        <td class="col-xs-5 table-content" rowspan="17">TRI</td>
                        <td>33</td>
                    </tr>
                    <tr>
                        <td>34</td>
                        <td>34</td>
                    </tr>
                    <tr>
                        <td>35</td>
                        <td>35</td>
                    </tr>
                    <tr>
                        <td>36</td>
                        <td>36</td>
                    </tr>
                    <tr>
                        <td>37</td>
                        <td>37</td>
                    </tr>
                    <tr>
                        <td>38</td>
                        <td>38</td>
                    </tr>
                    <tr>
                        <td>39</td>
                        <td>39</td>
                    </tr>
                    <tr>
                        <td>40</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>41</td>
                        <td class="col-xs-5 table-content" rowspan="14">TET</td>
                        <td>41</td>
                    </tr>
                    <tr>
                        <td>42</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>43</td>
                        <td>43</td>
                    </tr>
                    <tr>
                        <td>44</td>
                        <td>44</td>
                    </tr>
                    <tr>
                        <td>45</td>
                        <td>45</td>
                    </tr>
                    <tr>
                        <td>46</td>
                        <td>46</td>
                    </tr>
                    <tr>
                        <td>47</td>
                        <td>47</td>
                    </tr>
                    <tr>
                        <td>48</td>
                        <td>48</td>
                    </tr>
                    <tr>
                        <td>49</td>
                        <td>49</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td class="col-xs-5 table-content" rowspan="50">TET</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>51</td>
                        <td>51</td>
                    </tr>
                    <tr>
                        <td>52</td>
                        <td>52</td>
                    </tr>
                    <tr>
                        <td>53</td>
                        <td>53</td>
                    </tr>
                    <tr>
                        <td>54</td>
                        <td>54</td>
                    </tr>
                    <tr>
                        <td>55</td>
                        <td class="col-xs-5 table-no-content" rowspan="15"></td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <td>56</td>
                        <td>56</td>
                    </tr>
                    <tr>
                        <td>57</td>
                        <td>57</td>
                    </tr>
                    <tr>
                        <td>58</td>
                        <td>58</td>
                    </tr>
                    <tr>
                        <td>59</td>
                        <td>59</td>
                    </tr>
                    <tr>
                        <td>60</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>61</td>
                        <td>61</td>
                    </tr>
                    <tr>
                        <td>62</td>
                        <td>62</td>
                    </tr>
                    <tr>
                        <td>63</td>
                        <td>63</td>
                    </tr>
                    <tr>
                        <td>64</td>
                        <td>64</td>
                    </tr>
                    <tr>
                        <td>65</td>
                        <td>65</td>
                    </tr>
                    <tr>
                        <td>66</td>
                        <td>66</td>
                    </tr>
                    <tr>
                        <td>67</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <td>68</td>
                        <td>68</td>
                    </tr>
                    <tr>
                        <td>69</td>
                        <td>69</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td class="col-xs-5 table-content" rowspan="30">PEN</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>71</td>
                        <td>71</td>
                    </tr>
                    <tr>
                        <td>72</td>
                        <td>72</td>
                    </tr>
                    <tr>
                        <td>73</td>
                        <td>73</td>
                    </tr>
                    <tr>
                        <td>74</td>
                        <td>74</td>
                    </tr>
                    <tr>
                        <td>75</td>
                        <td>75</td>
                    </tr>
                    <tr>
                        <td>76</td>
                        <td>76</td>
                    </tr>
                    <tr>
                        <td>77</td>
                        <td>77</td>
                    </tr>
                    <tr>
                        <td>78</td>
                        <td>78</td>
                    </tr>
                    <tr>
                        <td>79</td>
                        <td>79</td>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>80</td>
                    </tr>
                    <tr>
                        <td>81</td>
                        <td>81</td>
                    </tr>
                    <tr>
                        <td>82</td>
                        <td>82</td>
                    </tr>
                    <tr>
                        <td>83</td>
                        <td>83</td>
                    </tr>
                    <tr>
                        <td>84</td>
                        <td>84</td>
                    </tr>
                    <tr>
                        <td>85</td>
                        <td>85</td>
                    </tr>
                    <tr>
                        <td>86</td>
                        <td>86</td>
                    </tr>
                    <tr>
                        <td>87</td>
                        <td>87</td>
                    </tr>
                    <tr>
                        <td>88</td>
                        <td>88</td>
                    </tr>
                    <tr>
                        <td>89</td>
                        <td>89</td>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>91</td>
                        <td>91</td>
                    </tr>
                    <tr>
                        <td>92</td>
                        <td>92</td>
                    </tr>
                    <tr>
                        <td>93</td>
                        <td>93</td>
                    </tr>
                    <tr>
                        <td>94</td>
                        <td>94</td>
                    </tr>
                    <tr>
                        <td>95</td>
                        <td>95</td>
                    </tr>
                    <tr>
                        <td>96</td>
                        <td>96</td>
                    </tr>
                    <tr>
                        <td>97</td>
                        <td>97</td>
                    </tr>
                    <tr>
                        <td>98</td>
                        <td>98</td>
                    </tr>
                    <tr>
                        <td>99</td>
                        <td>99</td>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td class="col-xs-5 table-no-content" rowspan="21"></td>
                        <td class="col-xs-5 table-content" rowspan="21">PEN</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>101</td>
                        <td>101</td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <td>103</td>
                        <td>103</td>
                    </tr>
                    <tr>
                        <td>104</td>
                        <td>104</td>
                    </tr>
                    <tr>
                        <td>105</td>
                        <td>105</td>
                    </tr>
                    <tr>
                        <td>106</td>
                        <td>106</td>
                    </tr>
                    <tr>
                        <td>107</td>
                        <td>107</td>
                    </tr>
                    <tr>
                        <td>108</td>
                        <td>108</td>
                    </tr>
                    <tr>
                        <td>109</td>
                        <td>109</td>
                    </tr>
                    <tr>
                        <td>110</td>
                        <td>110</td>
                    </tr>
                    <tr>
                        <td>111</td>
                        <td>111</td>
                    </tr>
                    <tr>
                        <td>112</td>
                        <td>112</td>
                    </tr>
                    <tr>
                        <td>113</td>
                        <td>113</td>
                    </tr>
                    <tr>
                        <td>114</td>
                        <td>114</td>
                    </tr>
                    <tr>
                        <td>115</td>
                        <td>115</td>
                    </tr>
                    <tr>
                        <td>116</td>
                        <td>116</td>
                    </tr>
                    <tr>
                        <td>117</td>
                        <td>117</td>
                    </tr>
                    <tr>
                        <td>118</td>
                        <td>118</td>
                    </tr>
                    <tr>
                        <td>119</td>
                        <td>119</td>
                    </tr>
                    <tr>
                        <td>120</td>
                        <td>120</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- VIEW SESSION -->
            {{--<div class="col-xs-12 session-data">{{ var_dump(Session::get('items')) }}</div>--}}

        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Enable tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
