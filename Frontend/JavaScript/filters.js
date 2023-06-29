function updateFilters() {
    var checkedLocations = document.querySelectorAll("input[name='location']:checked");
    var checkedServices = document.querySelectorAll("input[name='service']:checked");
    var checkedCategory = document.querySelectorAll("input[name='category']:checked");

    var locationFilter = "";
    var serviceFilter = "";
    var categoryFilter = "";

    checkedLocations.forEach(function(location) {
      locationFilter += location.value + ",";
    });

    checkedServices.forEach(function(service) {
      serviceFilter += service.value + ",";
    });

    checkedCategory.forEach(function(category) {
      categoryFilter += category.value + ",";
    });

    // Remove the trailing comma if any
    locationFilter = locationFilter.replace(/,$/, "");
    serviceFilter = serviceFilter.replace(/,$/, "");
    categoryFilter = categoryFilter.replace(/,$/, "");

    var url = "http://localhost/Registry-of-nursing-homes/registry/Frontend/Pages/indexRegistry.php";

    if (locationFilter !== "") {
      url += "?location=" + locationFilter;
    }

    if (serviceFilter !== "") {
      url += (locationFilter !== "" ? "&" : "?") + "service=" + serviceFilter;
    }

    if (categoryFilter !== "") {
      url += (categoryFilter !== "" ? "&" : "?") + "category=" + categoryFilter;
    }

    // Update the address bar
    // history.pushState(null, null, url);
    window.location.href = url;
    // history.replaceState(null, null, url);
}

    document.addEventListener('keydown', function(event) {
        var urlInput = document.getElementById('urlInput');
        if (event.key === 'Enter' && event.target === urlInput) {
          updateFiltersAndSubmit(event);
        }

    // document.addEventListener('change', function(event) {
    //   var target = event.target;
    //   if (target.matches("input[name='location']") || target.matches("input[name='service']") || target.matches("input[name='category']")) {
    //     updateFilters();
    //   }
  });


