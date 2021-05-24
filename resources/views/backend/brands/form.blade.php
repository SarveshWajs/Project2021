<div class="row">
	<div class="col-xs-6">
		<div class="form-group">
			<div class="row">
				<div class="col-sm-2">
					Name: <span class="important-text">*</span>
				</div>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="brand_name" value="{{ isset($brand) ? $brand->brand_name : old('brand_name') }}" placeholder="{{ isset($data['Blang']['Blang']['Name']) ? $data['Blang']['Blang']['Name'] : '名字' }}*">
				</div>
			</div>
		</div>
	</div>
</div>