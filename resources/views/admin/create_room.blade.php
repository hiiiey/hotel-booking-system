<!DOCTYPE html>
<html>

<head>
    @include('admin.css')


    <style type="text/css">
        /* Modern, compact form styling */
        .room-form {
            max-width: 550px;
            margin: 0 auto;
            background-color: #2d3035;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .form-header {
            background-color: #3a3f44;
            padding: 15px 20px;
            border-bottom: 1px solid #444;
            text-align: center;
            margin-bottom: 0;
        }
        
        .form-header h2 {
            font-size: 22px;
            margin: 0;
            color: #fff;
            font-weight: 500;
        }
        
        .form-body {
            padding: 20px;
        }
        
        .form-row {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .form-group {
            flex: 1 1 calc(50% - 8px);
            min-width: 200px;
        }
        
        .form-group.full-width {
            flex: 1 1 100%;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
            font-weight: 500;
            color: #b1b1b1;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #444;
            background-color: #32373d;
            color: #fff;
            border-radius: 3px;
            font-size: 14px;
            transition: border-color 0.15s;
            box-sizing: border-box;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #4c8bf5;
            outline: none;
        }
        
        .form-group textarea {
            height: 100px;
            resize: vertical;
        }
        
        .form-footer {
            background-color: #3a3f44;
            padding: 15px 20px;
            text-align: right;
            border-top: 1px solid #444;
        }
        
        .btn-submit {
            background-color: #4c8bf5;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .btn-submit:hover {
            background-color: #3a78e7;
        }
        
        .upload-group {
            margin-top: 5px;
        }
        
        .upload-group small {
            display: block;
            font-size: 11px;
            color: #999;
            margin-top: 5px;
        }
        
        /* Alert styling */
        .alert {
            margin-bottom: 20px;
            padding: 10px 15px;
            border-radius: 3px;
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.2);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #75b798;
        }
        
        .close {
            float: right;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
            background: transparent;
            border: 0;
        }
        
        .required::after {
            content: "*";
            color: #dc3545;
            margin-left: 3px;
        }
        
        .form-divider {
            border-top: 1px solid #444;
            margin: 15px 0;
        }
    </style>
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">


                <div class="room-form">
                    <div class="form-header">
                        <h2>Add New Room</h2>
                    </div>
                    
                    <div class="form-body">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                        
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label class="required">Room Title</label>
                                    <input type="text" name="title" placeholder="Enter room title" required value="{{ old('title') }}">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label class="required">Description</label>
                                    <textarea name="description" placeholder="Room description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-divider"></div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="required">Price (₱)</label>
                                    <input type="number" name="price" placeholder="Price" required value="{{ old('price') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select name="type">
                                        <option value="regular" {{ old('type') == 'regular' ? 'selected' : '' }}>Regular</option>
                                        <option value="premium" {{ old('type') == 'premium' ? 'selected' : '' }}>Premium</option>
                                        <option value="deluxe" {{ old('type') == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label>WiFi</label>
                                    <select name="wifi">
                                        <option value="yes" {{ old('wifi') == 'yes' ? 'selected' : '' }}>Available</option>
                                        <option value="no" {{ old('wifi') == 'no' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Room Image</label>
                                    <div class="upload-group">
                                        <input type="file" name="image" accept="image/*">
                                        <small>Max: 5MB (JPG, PNG)</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-footer">
                                <button type="submit" class="btn-submit">
                                    <i class="fa fa-plus-circle" style="margin-right: 5px;"></i>
                                    Add Room
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                    </form>


                </div>


            </div>
        </div>

    </div>


    @include('admin.footer')
</body>

</html>