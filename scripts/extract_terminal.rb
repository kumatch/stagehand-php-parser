#!/usr/bin/env ruby
grammar = []
is_cfg = false
is_grammar = false
non_terminal = nil
count = 0;

while line = ARGF.gets
  [[/\{[^'].+?[^']\}/, ''], [/^#.*$/, '']].each {|arg|
    line.gsub! arg[0], arg[1]
  }
  line.rstrip!

  is_cfg = !is_cfg if line[0, 2] == '%%'

  if is_grammar
    new_grammar = line.split
    case new_grammar[0]
    when '|'
      count += 1;
      puts "#{non_terminal}_#{count}"
      grammar = new_grammar
    when ';'
      count += 1;
      puts "#{non_terminal}_#{count}"
      puts "\n\n\n"
      grammar = []
    else
      grammar += new_grammar
    end
  else
#     puts line
  end

  if is_cfg && (/^(\w+):/ =~ line || line == ';')
    is_grammar = !is_grammar
    non_terminal = $1
    count = 0;
  end
end
