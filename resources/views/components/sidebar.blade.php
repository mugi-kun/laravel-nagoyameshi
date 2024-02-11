<div class="container">
 <button class="btn nagoyameshi-submit-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
  ➡︎絞り込み
</button>
</div>

<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="staticBackdropLabel">絞り込み</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>  
  <div class="offcanvas-body">
    <div>
    <h3 for="categories">カテゴリで</h3>
    @foreach ($categories as $category)
    <h2 class="nagoyameshi-sidebar-category-label"><a href="{{ route('shops.index', ['category' => $category->id]) }}">{{ $category->name }}</a></h2>
    @endforeach
    </div>
  </div>
  <hr>
  <div class="offcanvas-body">
    <div>
    <h3 for="budget">予算で</h3>
    <form action="{{ route('shops.index') }}" method="GET">
      @csrf
      <input type="number" name="min_budget" class="nagoyameshi-budget-form"><span>円以上 〜 </span><input type="number" name="max_budget" class="nagoyameshi-budget-form"><span>円以下</span>
      <br> 
      <input type="submit" value="絞り込み" class="btn nagoyameshi-submit-button">
    </form>
    </div>
  </div>
</div>
