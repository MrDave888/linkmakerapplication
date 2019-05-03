### Markdown To HTML CLI Conversion Application
---

#### How To Use 
Run ./console_application.php ConvertMarkdownToHtml \<markdown file location>\
Example : ./console_application.php ConvertMarkdownToHtml /markdown/example.md

#### Options
  --log || Used to log markdown convertion instead of saving to file.
  
  Usage Example: ./console_application.php ConvertMarkdownToHtml  --log /markdown/example.md

---
#### Reason in use for Parsedown conversion library
After looking at several available libraries that converted markdown to html I decided to use Parsedown. It is available for anything above PHP 5.3 but has also been tested on the latest version of PHP 7.3 and has been recently updated (as of 26 days ago) indicating that it is still maintained in comparsion to many of the other libraries where there last updates where over a year ago. It has no additional dependances and can be easily added and imported in projects through composer. It also boasts vastly improved conversion speeds in comparison to other converters, though I did not test if this was true.
