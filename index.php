<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" value="application/xhtml+xml;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>WynnBuilderDB</title>
  <meta name="description" content="WynnBuilderDB" />
  <meta name="keywords" content="web site." />
  <link href="./css/index.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
  <link rel="stylesheet" href="./css/theme.dark.min.css" />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/extras/jquery.tablesorter.pager.min.js"></script>
</head>

<body class="wrapper">
  <header>
    <h2 class="title">WynnBuilderDB</h2>
    <input type="checkbox" id="active" />
    <label for="active" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <div class="wrapper-ham">
      <ul>
        <li>
          <a href="https://discord.com/users/736028271153512489">Contact</a>
        </li>
        <li>
          <a href="/submit">Submit a Build</a>
        </li>
      </ul>
    </div>
  </header>
  <main class="content">
    <div class="buttondiv" id="buttons">
      <a href="#" class="bn3637 bn36" onclick="showContent(1)">Combat Builds</a>
      <a href="#" class="bn3637 bn36" onclick="showContent(2)">XP Builds</a>
      <a href="#" class="bn3637 bn36" onclick="showContent(3)">Lootrun Builds</a>
    </div>

    <div class="hider" id="content1">
      <table id="tablesorterCombat" class="tablesorterCombat">
        <thead>
          <th>#</th>
          <th>Class Icon</th>
          <th>Creator</th>
          <th>Build Title</th>
          <th>Build Desc</th>
          <th>Mythic's</th>
          <th>Quest Req</th>
          <th>Crafted's</th>
          <th>Legendary Island Req</th>
          <th>Boss altar Req</th>
          <th>Min lvl</th>
          <th>Date Posted</th>
          <th>Link</th>
        </thead>
        <tbody>
          <?php
          require_once "./config.php";
          $query = mysqli_query($link, "SELECT * FROM `buildsProd` order by `id` ASC") or die(mysqli_error($link));
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            print '<tr>';
            print '<td>' . $row['id'] . '</td>';
            print '<td><img class="class-icon" src="https://cdn.wynncraft.com/nextgen/classes/icons/artboards/' . $row['classURL'] . '.webp"/></td>';
            print '<td>' . $row['creator'] . '</td>';
            print '<td>' . $row['buildTitle'] . '</td>';
            print '<td>' . $row['buildDesc'] . '</td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conMythic'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conQuest'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conCrafted'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conLI'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conAltar'] . '.png" /></td>';
            print '<td>' . $row['minlvl'] . '</td>';
            print '<td>' . $row['date'] . '</td>';
            print '<td><a href="' . $row['link'] . '" target="_blank" rel="noopener noreferrer"><img class="coinflip-icon" src="./img/link.png" /></a></td>';
            print '</tr>';
          }
          ?>
        </tbody>
      </table>
      <div class="pagerCombat">
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/first.png" class="first" />
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/prev.png" class="prev" />
        <span class="pagedisplay"></span>
        <!-- this can be any element, including an input -->
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/next.png" class="next" />
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/last.png" class="last" />
        Page:
        <select class="gotoPage" title="Select page number"></select>
      </div>
    </div>

    <div class="hider" id="content2">
      <table id="tablesorterXP" class="tablesorterXP">
        <thead>
          <th>#</th>
          <th>Class Icon</th>
          <th>Creator</th>
          <th>Build Title</th>
          <th>Build Desc</th>
          <th>Mythic's</th>
          <th>Quest Req</th>
          <th>Crafted's</th>
          <th>Legendary Island Req</th>
          <th>Boss altar Req</th>
          <th>Min lvl</th>
          <th>Date Posted</th>
          <th>Link</th>
        </thead>
        <tbody>
          <?php
          require_once "./config.php";
          $query = mysqli_query($link, "SELECT * FROM `buildsProdXP` order by `id` ASC") or die(mysqli_error($link));
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            print '<tr>';
            print '<td>' . $row['id'] . '</td>';
            print '<td><img class="class-icon" src="https://cdn.wynncraft.com/nextgen/classes/icons/artboards/' . $row['classURL'] . '.webp"/></td>';
            print '<td>' . $row['creator'] . '</td>';
            print '<td>' . $row['buildTitle'] . '</td>';
            print '<td>' . $row['buildDesc'] . '</td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conMythic'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conQuest'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conCrafted'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conLI'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conAltar'] . '.png" /></td>';
            print '<td>' . $row['minlvl'] . '</td>';
            print '<td>' . $row['date'] . '</td>';
            print '<td><a href="' . $row['link'] . '" target="_blank" rel="noopener noreferrer"><img class="coinflip-icon" src="./img/link.png" /></a></td>';
            print '</tr>';
          }
          ?>
        </tbody>
      </table>
      <div class="pagerXP">
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/first.png" class="first" />
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/prev.png" class="prev" />
        <span class="pagedisplay"></span>
        <!-- this can be any element, including an input -->
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/next.png" class="next" />
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/last.png" class="last" />
        Page:
        <select class="gotoPage" title="Select page number"></select>
      </div>
    </div>

    <div class="hider" id="content3">
      <table id="tablesorterLR" class="tablesorter">
        <thead>
          <th>#</th>
          <th>Class Icon</th>
          <th>Creator</th>
          <th>Build Title</th>
          <th>Build Desc</th>
          <th>Mythic's</th>
          <th>Quest Req</th>
          <th>Crafted's</th>
          <th>Legendary Island Req</th>
          <th>Boss altar Req</th>
          <th>Min lvl</th>
          <th>Date Posted</th>
          <th>Link</th>
        </thead>
        <tbody>
          <?php
          require_once "./config.php";
          $query = mysqli_query($link, "SELECT * FROM `buildsProdLR` order by `id` ASC") or die(mysqli_error($link));
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            print '<tr>';
            print '<td>' . $row['id'] . '</td>';
            print '<td><img class="class-icon" src="https://cdn.wynncraft.com/nextgen/classes/icons/artboards/' . $row['classURL'] . '.webp"/></td>';
            print '<td>' . $row['creator'] . '</td>';
            print '<td>' . $row['buildTitle'] . '</td>';
            print '<td>' . $row['buildDesc'] . '</td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conMythic'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conQuest'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conCrafted'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conLI'] . '.png" /></td>';
            print '<td><img class="coinflip-icon" src="./img/' . $row['conAltar'] . '.png" /></td>';
            print '<td>' . $row['minlvl'] . '</td>';
            print '<td>' . $row['date'] . '</td>';
            print '<td><a href="' . $row['link'] . '" target="_blank" rel="noopener noreferrer"><img class="coinflip-icon" src="./img/link.png" /></a></td>';
            print '</tr>';
          }
          ?>
        </tbody>
      </table>
      <div class="pagerLR">
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/first.png" class="first" />
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/prev.png" class="prev" />
        <span class="pagedisplay"></span>
        <!-- this can be any element, including an input -->
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/next.png" class="next" />
        <img src="https://mottie.github.io/tablesorter/addons/pager/icons/last.png" class="last" />
        Page:
        <select class="gotoPage" title="Select page number"></select>
      </div>
  </main>

  <script type="text/javascript">
    function showContent(num) {
      var contents = document.getElementsByClassName("hider");
      for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = "none";
      }
      document.getElementById("content" + num).style.display = "block";
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $.tablesorter.addParser({
        id: "imageSrc",
        is: function (s) {
          return false;
        },
        format: function (s, table, cell) {
          // extract src attribute from all images
          var $imgs = $(cell).find("img");
          var srcs = $imgs
            .map(function () {
              return $(this).attr("src");
            })
            .get();
          return srcs.join(" ");
        },
        type: "text",
      });
      $("#tablesorterCombat")
        .tablesorter({
          theme: "dark",
          sortList: [[0, 1]],
          dateFormat: "mmddyyyy",
          widgets: ["zebra", "filter"],
          widgetOptions: {
            zebra: ["odd", "even"],
            filter_placeholder: { search: "Search..." },
            filter_columnFilters: true,
          },
          headers: {
            0: { filter: false },
            1: { sorter: "imageSrc", filter: false },
            2: { sorter: false },
            3: { sorter: false },
            4: { sorter: false },
            5: { sorter: "imageSrc", filter: false },
            6: { sorter: "imageSrc", filter: false },
            7: { sorter: "imageSrc", filter: false },
            8: { sorter: "imageSrc", filter: false },
            9: { sorter: "imageSrc", filter: false },
            11: { sorter: "shortDate", filter: false },
            12: { sorter: false, filter: false },
          },
        })
        .tablesorterPager({
          container: $(".pagerCombat"),
          ajaxUrl: null,
          ajaxProcessing: function (ajax) {
            if (ajax && ajax.hasOwnProperty("data")) {
              // return [ "data", "total_rows" ];
              return [ajax.data, ajax.total_rows];
            }
          },
          output: "{startRow} to {endRow} ({totalRows})",
          updateArrows: true,
          page: 0,
          size: 10,
          fixedHeight: false,
          removeRows: true,
          cssNext: ".next",
          cssPrev: ".prev",
          cssFirst: ".first",
          cssLast: ".last",
          cssGoto: ".gotoPage",
          cssPageDisplay: ".pagedisplay",
          cssPageSize: ".pagesize",
          cssDisabled: "disabled",
        });
      $("#tablesorterXP")
        .tablesorter({
          theme: "dark",
          sortList: [[0, 1]],
          dateFormat: "mmddyyyy",
          widgets: ["zebra", "filter"],
          widgetOptions: {
            zebra: ["odd", "even"],
            filter_placeholder: { search: "Search..." },
            filter_columnFilters: true,
          },
          headers: {
            0: { filter: false },
            1: { sorter: "imageSrc", filter: false },
            2: { sorter: false },
            3: { sorter: false },
            4: { sorter: false },
            5: { sorter: "imageSrc", filter: false },
            6: { sorter: "imageSrc", filter: false },
            7: { sorter: "imageSrc", filter: false },
            8: { sorter: "imageSrc", filter: false },
            9: { sorter: "imageSrc", filter: false },
            11: { sorter: "shortDate", filter: false },
            12: { sorter: false, filter: false },
          },
        })
        .tablesorterPager({
          container: $(".pagerXP"),
          ajaxUrl: null,
          ajaxProcessing: function (ajax) {
            if (ajax && ajax.hasOwnProperty("data")) {
              // return [ "data", "total_rows" ];
              return [ajax.data, ajax.total_rows];
            }
          },
          output: "{startRow} to {endRow} ({totalRows})",
          updateArrows: true,
          page: 0,
          size: 10,
          fixedHeight: false,
          removeRows: true,
          cssNext: ".next",
          cssPrev: ".prev",
          cssFirst: ".first",
          cssLast: ".last",
          cssGoto: ".gotoPage",
          cssPageDisplay: ".pagedisplay",
          cssPageSize: ".pagesize",
          cssDisabled: "disabled",
        });
      $("#tablesorterLR")
        .tablesorter({
          theme: "dark",
          sortList: [[0, 1]],
          dateFormat: "mmddyyyy",
          widgets: ["zebra", "filter"],
          widgetOptions: {
            zebra: ["odd", "even"],
            filter_placeholder: { search: "Search..." },
            filter_columnFilters: true,
          },
          headers: {
            0: { filter: false },
            1: { sorter: "imageSrc", filter: false },
            2: { sorter: false },
            3: { sorter: false },
            4: { sorter: false },
            5: { sorter: "imageSrc", filter: false },
            6: { sorter: "imageSrc", filter: false },
            7: { sorter: "imageSrc", filter: false },
            8: { sorter: "imageSrc", filter: false },
            9: { sorter: "imageSrc", filter: false },
            11: { sorter: "shortDate", filter: false },
            12: { sorter: false, filter: false },
          },
        })
        .tablesorterPager({
          container: $(".pagerLR"),
          ajaxUrl: null,
          ajaxProcessing: function (ajax) {
            if (ajax && ajax.hasOwnProperty("data")) {
              // return [ "data", "total_rows" ];
              return [ajax.data, ajax.total_rows];
            }
          },
          output: "{startRow} to {endRow} ({totalRows})",
          updateArrows: true,
          page: 0,
          size: 10,
          fixedHeight: false,
          removeRows: true,
          cssNext: ".next",
          cssPrev: ".prev",
          cssFirst: ".first",
          cssLast: ".last",
          cssGoto: ".gotoPage",
          cssPageDisplay: ".pagedisplay",
          cssPageSize: ".pagesize",
          cssDisabled: "disabled",
        });
    });
  </script>
  </div>
  <footer style="margin-top: auto; text-align: center">
    <a class="privacy" href="../privacy.html">Privacy Policy</a>
  </footer>
</body>

</html>