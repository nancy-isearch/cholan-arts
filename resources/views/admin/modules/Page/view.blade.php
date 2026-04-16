@extends('admin.layouts.app')

@section('content')
    <section @class(['section'])>
        <div @class(['container-fluid'])>
            <!-- ========== title-wrapper start ========== -->
            <div @class(['title-wrapper', 'pt-30'])>
                <div @class(['row', 'align-items-center'])>
                    <div @class(['col-md-6'])>
                        <div @class(['title'])>
                            <h2>Product Details</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div @class(['col-md-6'])>
                        <div @class(['breadcrumb-wrapper'])>
                            <a href="/admin/products" class="btn btn-primary">
                                Back
                            </A>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div @class(['row'])>
              <div @class(['col-lg-12'])>
                <div @class(['card-style', 'mb-30'])>
                  <div @class(['table-wrapper', 'table-responsive'])>

                        {{-- ✅ Basic Info --}}
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Name:</strong> {{ $product->name }}</div>
                            <div class="col-md-4"><strong>Slug:</strong> {{ $product->slug }}</div>
                            <div class="col-md-4"><strong>Price:</strong> ₹{{ $product->price }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Discount:</strong> {{ $product->discount }}%</div>
                            <div class="col-md-4"><strong>Stock:</strong> {{ $product->stock }}</div>
                            <div class="col-md-4"><strong>Status:</strong> 
                                {!! $product->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' !!}
                            </div>
                        </div>

                        {{-- ✅ Description --}}
                        <div class="mb-3">
                            <strong>Short Description:</strong>
                            <p>{{ $product->short_description }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p>{!! $product->description !!}</p>
                        </div>

                        {{-- ✅ Tags --}}
                        <div class="mb-3">
                            <strong>Tags:</strong><br>

                            @php
                                $tags = explode(',', $product->tags);
                            @endphp

                            @foreach($tags as $tag)
                                <span class="badge bg-secondary">{{ trim($tag) }}</span>
                            @endforeach
                        </div>

                        {{-- ✅ Available Sizes --}}
                        <div class="mb-3">
                            <strong>Available Sizes:</strong><br>

                            @php
                                $available_sizes = explode(',', $product->available_sizes);
                            @endphp

                            @foreach($available_sizes as $available_size)
                                <span class="badge bg-secondary">{{ trim($available_size) }}</span>
                            @endforeach
                        </div>

                        {{-- ✅ Other Details --}}
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Material:</strong> {{ $product->material }}</div>
                            <div class="col-md-4"><strong>Origin:</strong> {{ $product->origin }}</div>
                            <div class="col-md-4"><strong>Finish:</strong> {{ $product->finish }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Technique:</strong> {{ $product->technique }}</div>
                            <div class="col-md-4"><strong>Delivery:</strong> {{ $product->delivery }}</div>
                        </div>

                        <div class="mb-3">
                            <strong>GI Certified:</strong> 
                            {{ $product->gi_certified}}
                        </div>

                        {{-- ✅ Images --}}
                        <div class="mb-4">
                            <strong>Images:</strong><br><br>

                            <div class="row">
                                @foreach($product->images as $img)
                                    <div class="col-md-2 mb-2">
                                        <img src="{{ asset('uploads/products/'.$product->id .'/'.$img->image) }}" class="img-fluid rounded">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- Sections --}}
                        <div class="mb-4">
                            <strong>Sections:</strong>

                            @foreach($product->sections as $section)
                                <div class="border p-3 mb-2 rounded">
                                    <strong>Type:</strong> {{ ucfirst($section->type) }} <br>
                                    <strong>Title:</strong> {{ $section->title }} <br>
                                    <strong>Description:</strong>
                                    <p>{{ $section->description }}</p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
            
        </div>
    </section>
@endsection